@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức :
                        <small>{{$new->TieuDe}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-12" style="padding-bottom:20px">
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
                    <form action="{{route('admin.news.handle.edit', ['id'=>$new->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Thể loại :</label>
                            <select class="form-control" name="category" id="caTe">
                                <option>--- Root ---</option>
                                @foreach($caTe as $ct)
                                    <option
                                        @if($new->typeNews->categories->id == $ct->id)
                                            {{"selected"}}
                                        @endif
                                        value="{{$ct->id}}">{{$ct->Ten}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Loại tin :</label>
                            <select class="form-control" name="typenews" id="news">
                                <option>--- Root ---</option>
                                @foreach($tyPe as $tp)
                                    <option
                                        @if($new->typeNews->id == $tp->id)
                                        {{"selected"}}
                                        @endif
                                        value="{{$tp->id}}">{{$tp->Ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề :</label>
                            <input class="form-control" name="title" placeholder="Please Enter Title" value="{{$new->TieuDe}}" >
                        </div>
                        <div class="form-group">
                            <label>Thẻ tag :</label>
                            <input class="form-control" name="tag" placeholder="Please Enter Tag" value="{{$new->tag}}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả :</label>
                            <textarea name="post_content" id="post_content" rows="10" cols="150" class="form-control" rows="150">{{$new->TomTat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung :</label>
                            <textarea name="post_content_1" id="post_content_1" rows="10" cols="150" class="form-control" rows="150">{{$new->NoiDung}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Hình ảnh :</label>
                            <p><img width="400px" src="{{asset("upload/tintuc/$new->Hinh")}}" alt=""></p>
                            <input class="form-control" type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label>Nổi bật :</label>
                            <label class="radio-inline">
                                <input name="highlights" value="0"
                                       @if($new->NoiBat == 0)
                                           {{"checked"}}
                                       @endif
                                       type="radio">Enabled
                            </label>
                            <label class="radio-inline">
                                <input name="highlights" value="1"
                                       @if($new->NoiBat == 1)
                                       {{"checked"}}
                                       @endif
                                       type="radio">Disabled
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Sửa</button>
                        <button type="reset" class="btn btn-primary">Thoát</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bình luận :
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert-success alert">
                        {{session('thongbao')}}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Người dùng</th>
                        <th>Nội dung</th>
                        <th>Ngày đăng</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($new->comment as $cm)
                        <tr class="odd gradeX" align="center">
                            <td>{{$cm->id}}</td>
                            <td>{{$cm->user->name}}</td>
                            <td>{{$cm->NoiDung}}</td>
                            <td>{{$cm->created_at}}</td>
                            <td class="center text-danger"><i class="far fa-trash-alt"></i><a href="{{route('admin.comment.delete',['idc' => $cm->id, 'idNews' => $new->id])}}">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--end row--}}
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->



@endsection

@push('javascript')
    <script type="text/javascript">

        $(document).ready(function () {
            $("#caTe").change(function () {
                var idCategory = $(this).val();//gan thanh id cua cate
                var url = "/admin/ajax/type/" + idCategory;
                $.get(url, function (data) {
                    $('#news').html(data);
                });
            });
        });
    </script>
    {{-- Replace the <textarea id="editor1"> with a CKEditor--}}
    <script>
        // instance, using default configuration.
        CKEDITOR.replace( 'post_content' );
        CKEDITOR.replace( 'post_content_1' );
    </script>
@endpush
