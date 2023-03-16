@extends('layout')
@section('title')
    My Friend
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-lg-6 offset-lg-3">
        <div class="row">
            @foreach ($friends as $item)
                <div class="col-12 col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="ratio ratio-1x1 rounded-circle overflow-hidden avatar-sm">
                                    <img src="{{$item->avatar}}" class="card-img-top img-cover" alt="Raeesh">
                                </div>
                                <div class="d-flex flex-column ps-2">
                                    <h6 class="mb-0">{{$item->name}}</h6>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-danger w-100 unfriend" data-id="{{$item->id}}" data-name="{{$item->name}}">unfriend</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('body').on('click','.unfriend',async function(){
                let {isConfirmed} = await swalDelete('คุณกำลังจะเลิกเป็นเพื่อนกับ "'+$(this).data('name')+'"','Unfriend ?');
                try {
                    await axios.delete('friends/'+$(this).data('id'))
                } catch (error) {
                    console.error("Error:", error);

                    swalError('เกิดข้อผิดพลาด Code: '+error.response.status);
                    return;
                }
                $(this).parent().parent().parent().remove();
                swalSuccess();
        })
    })
</script>
@endsection