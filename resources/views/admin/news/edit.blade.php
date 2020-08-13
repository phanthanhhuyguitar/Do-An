@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">News
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
                            <label>Category</label>
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
                            <label>News Type</label>
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
                            <label>Title</label>
                            <input class="form-control" name="title" placeholder="Please Enter Title" value="{{$new->TieuDe}}" >
                        </div>
                        <div class="form-group">
                            <label>Summary</label>
                            <textarea name="post_content" id="post_content" rows="10" cols="150" class="form-control" rows="150">{{$new->TomTat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="post_content_1" id="post_content_1" rows="10" cols="150" class="form-control" rows="150">{{$new->NoiDung}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <p><img width="400px" src="{{asset("upload/tintuc/$new->Hinh")}}" alt=""></p>
                            <input class="form-control" type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label>Highlights</label>
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
                        <button type="submit" class="btn btn-success">Edit</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Comment
                        <small>List</small>
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
                        <th>User</th>
                        <th>Content</th>
                        <th>Post Date</th>
                        <th>Delete</th>
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
