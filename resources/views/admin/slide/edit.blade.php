@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide :
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-12" style="padding-bottom:120px">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors -> all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form action="{{route('admin.slide.handle.edit', ['id'=>$slide->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên :</label>
                        <input class="form-control" value="{{$slide->Ten}}" name="name" placeholder="Please Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Nội dung :</label>
                        <textarea name="post_content_1"  id="post_content_1" rows="10" cols="150" class="form-control" rows="150">{{$slide->NoiDung}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Thể loại :</label>
                        <input type="text" class="form-control" name="category" value="{{$slide->theloai}}" placeholder="Please Enter Category">
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh : </label><span>(750 x 645)</span>
                        <p><img width="400px" src="{{asset("upload/slide/$slide->Hinh")}}" alt=""></p>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-success">Sửa</button>
                    <button type="reset" class="btn btn-primary">Thoát</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
@push('javascript')
    <script>
        // instance, using default configuration.
        CKEDITOR.replace( 'post_content' );
        CKEDITOR.replace( 'post_content_1' );
    </script>
@endpush
