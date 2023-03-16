<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $friendId = auth()->user()->friends->map(function($item){
            return $item->id;
        });
        return Post::with(['attachments','author'])->withCount('comments')
        ->where('user_id',auth()->user()->id)
        ->orWhere(function($q)use($friendId){
            $q->whereIn('user_id',$friendId);
        })
        ->orderBy('created_at','desc')->paginate(15);
    }
    public function store(Request $request)
    {
        $input = $this->validate($request,[
            'type'=>'required',
            'message'=>'required_if:type,status|string',
        ]);
        $input['user_id'] = auth()->user()->id;
        $input['name'] = '';
        $post = Post::create($input);
        if($request->hasFile('image')){
            $path = $request->file('image')->store('/attachments/images','public');
            $post->attachments()->create([
                'name'=> $request->file('image')->getClientOriginalName(),
                'url'=> Storage::disk('public')->url($path),
            ]);
        }
        return response()->json($post);
    }
    public function update(Request $request,Post $post)
    {
        if($request->user()->cannot('update',$post)){
            return response()->json(['message'=>'Forbidden'],403);
        }
        $input = $this->validate($request,[
            'type'=>'required',
            'message'=>'required_if:type,status|string',
        ]);
        if($input['type'] == 'status' && $post->type == 'photo'){
            $post->attachments()->delete();
        }else if($input['type'] == 'photo'){
            $post->attachments()->delete();
            if($request->hasFile('image')){
                $path = $request->file('image')->store('/attachments/images','public');
                $post->attachments()->create([
                    'name'=> $request->file('image')->getClientOriginalName(),
                    'url'=> Storage::disk('public')->url($path),
                ]);
            }
        }
        $post->update($input);
        $post = Post::with(['attachments','author'])->find($post->id);
        return response()->json($post);
    }
    public function destroy(Request $request,Post $post)
    {
        if($request->user()->cannot('delete',$post)){
            return response()->json(['message'=>'Forbidden'],403);
        }
        $post->attachments()->delete();
        $post->delete();
        return response()->json(['message'=>'success']);
    }
    public function comments(Post $post)
    {
        $comments = Comment::with('commenter')->where('commentable_type',"App\Models\Post")->where('commentable_id',$post->id)->get();
        return response()->json($comments);
    }
    public function addComment(Request $request,Post $post)
    {
        $input = $this->validate($request,[
            'message'=>'required|string',
        ]);
        $comment = $post->comments()->create([
            'message'=> $input['message'],
            'commenter_id'=> auth()->user()->id
        ]);
        $comment = Comment::with(['commenter'])->find($comment->id);
        return response()->json([
            'comment'=> $comment,
            'total_comment'=> $post->comments()->count()
        ]);
    }
}
