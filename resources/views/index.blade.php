@extends('layout')
@section('title')
    Home
@endsection
@section('content')
<input type="hidden" name="" id="userId" value="{{auth()->user()->id}}">
<div class="row">
    <div class="col-12 col-lg-6 offset-lg-3">
        <div class="friend-you-may-know mb-3">
            <h6>คนที่คุณอาจรู้จัก</h6>
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($friendsYouMayKnow as $item)
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="ratio ratio-1x1 rounded-circle overflow-hidden avatar-sm">
                                            <img src="{{$item->avatar}}" class="card-img-top img-cover" alt="Raeesh">
                                        </div>
                                        <div class="d-flex flex-column ps-2">
                                            <h6 class="mb-0">{{$item->name}}</h6>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-primary w-100 add-friend" data-id="{{$item->id}}">Add friend</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <form action="javascript:void(0)" class="mb-3 form-create-post">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="type" id="type" value="status" >
            <div class="card">
                <div class="card-body">
                    <div class="overflow-auto" style="height:100%;max-height:200px;">
                        <textarea name="message" class="form-control" id="message" cols="30" rows="4"
                            placeholder="คุณกำลังคิดอะไรอยู่"></textarea>
                        <input type="file" name="image" accept="image/*" id="image" style="display:none">
                        <div class="preview-image mt-2 position-relative" style="display:none">
                            <label for="image" class="btn btn-light position-absolute btn-sm" style="top:5px;left:5px">เปลี่ยนรูป</label>
                            <button type="button" class="btn btn-danger position-absolute" id="removePostImage" style="top:5px;right:5px;">
                                <i class="fas fa-times"></i>
                            </button>
                            <img src="{{asset('assets/img/profile/profile-1.webp')}}" id="previewPostImage" class="w-100" alt="">
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <label for="image" type="button" class="btn btn-primary">
                            <i class="fas fa-image"></i>
                        </label>
                        <button class="btn btn-sm btn-primary text-nowrap w-100 ms-2" type="submit" onclick="createPost()">
                            โพสต์
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div id="loading" style="display:none
        ">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="posts" id="posts" >
            {{-- @for ($y = 0; $y < 10; $y++) <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row">
                            <div class="ratio ratio-1x1 rounded-circle overflow-hidden avatar-sm">
                                <img src="{{asset('assets/img/user.png')}}" class="card-img-top img-cover" alt="Raeesh">
                            </div>
                            <div class="d-flex flex-column ps-2">
                                <h6 class="mb-0">PLayerarm</h6>
                                <span class="text-muted">1 ชม.</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="#" class="my-auto post-tool-button text-muted">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="my-auto post-tool-button text-muted">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <section class="text-zone text-truncate">
                        🧑‍💻 เรียน Python เขียนบอทเกมเพื่อสร้างรายได้
                        ( ไม่มีพื้นฐานก็เรียนได้ ) สร้างบอทได้ทุกเกมง่ายๆ
                        เนื้อหายาว 4 ชม. 🌟 โปร 199 บ. ( ปกติ 1990 บ. )
                        .
                        📢 เนื้อหาการสอน จะเน้นเขียนบอท 2 ชนิด
                        1.บอทแบบ หาภาพบนหน้าจอ
                        2.บอทแบบ หาสีบนหน้าจอ
                        * รูปแบบบอทจะเป็น Autoclick สามารถปรับใช้ได้กับทุกเกม
                        .
                        เนื้อหาประกอบด้วย 10 บทเรียน
                        ✅ 1. พื้นฐานภาษา Python ( เฉพาะฟังก์ชั่นที่จำเป็นสำหรับเขียนบอท )
                        ✅ 2. วิธีใช้ Tools สำหรับช่วยเขียนบอทเกมโดนเฉพาะ
                        ✅ 3. วิธีใช้บอทควบคุม Mouse
                        ✅ 4. วิธีใช้บอทควบคุม Keyboard
                        ✅ 5. วิธีใช้บอทพิมพ์ข้อความที่เราต้องการ
                        ✅ 6. วิธีให้บอทค้นหา ภาพที่เราต้องการบนหน้าจอ
                        ✅ 7. วิธีใช้บอทค้นหา Pixel สี บนหน้าจอ
                        ✅ 8. วิธีใช้บอท Click ตามภาพ ที่เราต้องการ
                        ✅ 9. วิธีใช้บอท Click ตาม Pixel สี ที่เราต้องการ
                        ✅ 10. วิธีเขียน Loop ให้บอททำงานได้อย่างต่อเนื่อง
                        .
                        🌟 Bonus พิเศษ
                        -✅ มีเทมเพลตสำเร็จรูปพร้อมสร้างบอทได้ทันทีให้ฟรี
                        -✅ สอนเทคนิคการแปลงไฟล์เป็น exe
                        -✅ สอนเทคนิคการเข้ารหัสไฟล์
                        -✅ สอนเทคนิคการปกป้อง Code เพื่อไม่ให้คนอื่นมองเห็น
                        .
                        เหมาะสำหรับผู้ที่สนใจเรียนเขียน Code เพื่อนำไปสร้างรายได้เสริม
                    </section>
                    <section class="image-zone"></section>
                </div>
                <div class="card-footer">
                    <section class="comment-zone pt-2">
                        <ul class="comment">
                            @for ($i = 0; $i < 5; $i++) 
                            <li class="comment-item mb-3">
                                <div class="d-flex flex-row">
                                    <div class="ratio ratio-1x1 rounded-circle overflow-hidden avatar-xs">
                                        <img src="{{asset('assets/img/user.png')}}" class="card-img-top img-cover"
                                            alt="Raeesh">
                                    </div>
                                    <div class="d-flex flex-column ps-2">
                                        <div class="wrapper">
                                            <h6 class="mb-0 commenter-name">PLayerarm</h6>
                                            <div class="comment-detail">1 ชม.</div>
                                        </div>
                                        <div class="comment-footer mt-1">
                                            <a href="javascript:void(0)" class="text-muted">
                                                ตอบกลับ
                                            </a>
                                            <span class="reply-time text-muted ms-2">1 สัปดาห์</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                                @endfor
                        </ul>
                    </section>
                    <hr>
                    <form class="d-flex">
                        <input class="form-control form-control-sm me-2" type="search" placeholder="เขียนความคิดเห็น"
                            aria-label="Search">
                        <button class="btn btn-sm btn-outline-secondary text-nowrap" type="submit">
                            <i class="fas fa-comment-dots"></i>
                        </button>
                    </form>
                </div>
        </div>
        @endfor --}}
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    var loading = $('#loading');
    var  nextUrl = null;
    $(window).scroll(function() {
        if($(window).scrollTop() == $(document).height() - $(window).height()) {
            fetchPosts('loadMore');
        }
    });
        $(document).ready(function(){
            initSwipper();
            $('#image').on('change',function(){
                const [file] = $(this)[0].files
                if (file) {
                    let url = URL.createObjectURL(file)
                    $('#previewPostImage').attr('src',url)
                    $('#previewPostImage').parent().show();
                    $('#type').val('photo')
                }
            })
            $('#removePostImage').on('click',function(){
                $('#type').val('status')
                $('#previewPostImage').parent().hide();
                $('#image').val('');
            })
            $('body').on('click','.remove-post',async function(){
                let {isConfirmed} = await swalDelete();
                if(!isConfirmed){
                    return false;
                }
                try {
                    await axios.delete('/posts/'+$(this).data('id'))
                } catch (error) {
                    console.error("Error:", error);

                    swalError('เกิดข้อผิดพลาด Code: '+error.response.status);
                    return;
                }
                $(this).parent().parent().parent().parent().remove();
                swalSuccess();
            })
            $('body').on('click','.edit-post',function (){
                let card = $(this).parent().parent().parent().parent().parent();
                card.find('.post-content').hide();
                card.find('.form-update-post').show();
            })
            $('body').on('click','.cancel-edit',function (){
                let card = $(this).parent().parent().parent().parent();
                card.find('.post-content').show();
                card.find('.form-update-post').hide();
            })
            $('body').on('change','.form-update-post input[name="image"]',function(){
                const [file] = $(this)[0].files
                if (file) {
                    let url = URL.createObjectURL(file)
                    $(this).parent().find('img').attr('src',url)
                    $(this).parent().find('.preview-image').show();
                    $(this).parent().find('input[name="type"]').val('photo')
                }
            })
            $('body').on('click','.form-update-post .remove-image',function(){
                let form = $(this).parent().parent().parent();
                form.find('.preview-image').hide();
                form.find('input[name="type"]').val('status')
                form.find('input[name="image"]').val('')
            })
            $('body').on('submit','.form-update-post',async function(){
                let formData = new FormData($(this)[0]);
                try {
                    var res = await axios.post('/posts/'+$(this).data('id'),formData)
                } catch (error) {
                    console.error("Error:", error);
                }
                console.log(res)
                let card = $(this).parent().parent();
                let newContent = generateCardContent(res.data);
                card.html(newContent)
            })
            $('.add-friend').on('click',async function(){
                try {
                    var res = await axios.post('/friends',{
                        friend_id : $(this).data('id')
                    })
                } catch (error) {
                    console.error("Error:", error);
                    swalError('เกิดข้อผิดพลาด Code: '+error.response.status);
                    return;
                }
                $(this).parent().parent().parent().remove();
                initSwipper();
                fetchPosts();
            })
            $('body').on('submit','.form-create-comment',async function(){
                let cardFooter = $(this).parent();
                let commentZone = cardFooter.find('.comment');
                try {
                    var res = await axios.post('/posts/'+$(this).data('post-id')+'/add-comment',{
                        message : $(this).find('input').val()
                    })
                } catch (error) {
                    console.error("Error:", error);
                    swalError('เกิดข้อผิดพลาด Code: '+error.response.status);
                    return;
                }
                let content= generateCommentContent(res.data.comment)
                commentZone.append(content)
                $(this)[0].reset();
                cardFooter.find('.total-comment').html(res.data.total_comment)
                // cardFooter.find('.hide-comment').show();
                // cardFooter.find('.show-comment').hide();
            })
            $('body').on('click','.show-comment',async function(){
                let res = await axios.get('/posts/'+$(this).data('id')+'/comments');
                let commentContent = res.data.reduce((html,item)=>{
                    let content = generateCommentContent(item)
                    return html + content
                },'')
                $(this).hide();
                $(this).parent().find('.hide-comment').show();
                $(this).parent().find('.comment').html(commentContent)
            })
            $('body').on('click','.hide-comment',function(){
                $(this).hide();
                $(this).parent().find('.comment').html('')
                $(this).parent().find('.show-comment').show();
            })
            $('body').on('click','.reply-comment',function(){
                let cardFooter = $(this).parent().parent().parent().parent().parent().parent().parent();
                let input = cardFooter.find('input');
                input.val(`@${$(this).data('name')} `)
                input.focus()
            })
            fetchPosts();
        })
        function initSwipper(){
            const swiper = new Swiper('.swiper', {
                // Optional parameters
                direction: 'horizontal',
                slidesPerView: 3,
                spaceBetween: 30,
                freeMode: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        }
        async function fetchPosts(type = 'reload')
        {
            let url = "/posts";
            if(type == 'loadMore'){
                url = nextUrl
                if(url == null){
                    return;
                }
            }
            let res = await axios.get(url);
            if(res.data.last_page != 1){
                nextUrl = res.data.next_page_url
            }
            let posts = res.data.data
            let postContent = posts.reduce((html,item)=>{
                let content = generateCardContent(item);
                return html + (`
                    <div class="card mb-3">${content}
                    </div>
                `)
            },'')
            if(type == 'reload'){
                $('#posts').html(postContent)
            }else{
                $('#posts').append(postContent)
            }
        }
        async function createPost()
        {
            let formData = new FormData($('.form-create-post')[0]);
            try {
                var res = await axios.post('/posts',formData)
            } catch (error) {
                console.error("Error:", error);
            }
            $('.form-create-post')[0].reset();
            $('.preview-image').hide();
            fetchPosts();
        }
        function generateCardContent(post){
            let userId = $('#userId').val();
            let message = '';
            let attachmentContent = '';
            let postImageUrl = '';
            if(post.type == 'photo'){
                if(post.attachments.length > 0){
                    postImageUrl = post.attachments[0].url
                }
                attachmentContent = `<img src="${postImageUrl}" class="w-100"/>`
            }
            return (`
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row">
                            <div class="ratio ratio-1x1 rounded-circle overflow-hidden avatar-sm">
                                <img src="${post.author.avatar}" class="card-img-top img-cover" alt="Raeesh">
                            </div>
                            <div class="d-flex flex-column ps-2">
                                <h6 class="mb-0">${post.author.name}</h6>
                                <span class="text-muted">${moment(post.created_at).fromNow()}</span>
                            </div>
                        </div>
                        <div style="${userId != post.user_id ? 'display:none' : ''}">
                            <div class="d-flex h-100">
                                <a href="javascript:void(0)" class="my-auto post-tool-button text-muted edit-post">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="my-auto post-tool-button text-muted remove-post" data-id="${post.id}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="post-content">
                        <section class="text-zone p-3">${post.message}</section>
                        <section class="image-zone">${attachmentContent}</section>
                    </div>
                    <form action="javascript:void(0)" class="mb-3 form-update-post p-3" data-id="${post.id}" style="display:none">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="type" value="${post.type}" >
                        <input type="file" name="image" accept="image/*" id="image${post.id}" style="display:none">
                        <div class="overflow-auto" style="height:100%;max-height:200px;">
                            <textarea name="message" class="form-control" cols="30" rows="4"
                                        placeholder="คุณกำลังคิดอะไรอยู่">${post.message}</textarea>
                            <div class="preview-image mt-2 position-relative" style="${post.type == 'status' ? 'display:none' : ''}">
                                <label for="image${post.id}" class="btn btn-light position-absolute btn-sm" style="top:5px;left:5px">เปลี่ยนรูป</label>
                                <button type="button" class="btn btn-danger position-absolute remove-image" style="top:5px;right:5px;">
                                    <i class="fas fa-times"></i>
                                </button>
                                <img src="${postImageUrl}" class="w-100" alt="">
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <label for="image${post.id}" type="button" class="btn btn-primary">
                                <i class="fas fa-image"></i>
                            </label>
                            <button class="btn btn-sm btn-primary text-nowrap w-100 ms-2" type="submit">
                                อัพเดท
                            </button>
                            <button class="btn btn-sm btn-danger text-nowrap w-25 ms-2 cancel-edit" type="button">
                                ยกเลิก
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <section class="comment-zone pt-2">
                        <a href="javascript:void(0)" class="show-comment" data-id="${post.id}">แสดงความคิดเห็นทั้งหมด (<span class="total-comment">${post.comments_count}</span>)</a>
                        <ul class="comment">
                        </ul>
                        <a href="javascript:void(0)" class="hide-comment mt-3" style="display:none">ซ่อนความคิดเห็นทั้งหมด (<span class="total-comment">${post.comments_count}</span>)</a>
                    </section>
                    <hr>
                    <form class="d-flex form-create-comment" action="javascript:void(0)" data-post-id="${post.id}">
                        <input class="form-control form-control-sm me-2 comment-input" type="text" name="message" placeholder="พิมพ์ความคิดเห็น">
                        <button class="btn btn-sm btn-outline-secondary text-nowrap" type="submit">
                            <i class="fas fa-comment-dots"></i>
                        </button>
                    </form>
                </div>
            `)
        }
        function generateCommentContent(comment){
            return (`
                <li class="comment-item mb-3">
                    <div class="d-flex flex-row">
                        <div class="ratio ratio-1x1 rounded-circle overflow-hidden avatar-xs">
                            <img src="${comment.commenter.avatar}" class="card-img-top img-cover"alt="Raeesh">
                        </div>
                        <div class="d-flex flex-column ps-2">
                            <div class="wrapper">
                                <h6 class="mb-0 commenter-name">${comment.commenter.name}</h6>
                                <div class="comment-detail">${comment.message}</div>
                            </div>
                            <div class="comment-footer mt-1">
                                <a href="javascript:void(0)" class="text-muted reply-comment" data-name="${comment.commenter.name}">
                                    ตอบกลับ
                                </a>
                                <span class="reply-time text-muted ms-2">${moment(comment.created_at).fromNow()}</span>
                            </div>
                        </div>
                    </div>
                </li>
            `)
        }
</script>
@endsection