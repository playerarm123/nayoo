<?php

namespace App\Http\Controllers;

use Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FacebookController extends Controller
{
    protected $fb;
    public function __construct()
    {
        $this->fb = new Facebook([
            'app_id' => config('services.facebook.client_id'),
            'app_secret' => config('services.facebook.client_secret'),
            'default_graph_version' => 'v2.10',
        ]);
    }
    public function getPages()
    {
        try {
            // Returns a `Facebook\Response` object
            $response = $this->fb->get('/me?fields=accounts', auth()->user()->fb_access_token);
        } catch (Facebook\Exception\ResponseException $e) {
            Log::error('Graph returned an error',[
                'detail'=> $e->getMessage()
            ]);
            return response()->json(['message'=>'ไม่สามารถโหลดโพสต์ได้'],400);
        } catch (Facebook\Exception\SDKException $e) {
            Log::error('Facebook SDK returned an error',[
                'detail'=> $e->getMessage()
            ]);
            return response()->json(['message'=>'ไม่สามารถโหลดโพสต์ได้'],400);
        }
        $user = $response->getGraphUser();
        dd($user);
    }
}
