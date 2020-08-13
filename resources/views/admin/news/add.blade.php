@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News
                    <small>Add</small>
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
                <form action="{{route('admin.news.handle.add')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category" id="caTe">
                            <option>--- Root ---</option>
                            @foreach($caTe as $ct)
                                <option value="{{$ct->id}}">{{$ct->Ten}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>News Type</label>
                        <select class="form-control" name="typenews" id="news">
                            <option>--- Root ---</option>
                            @foreach($tyPe as $tp)
                                <option value="{{$tp->id}}">{{$tp->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" placeholder="Please Enter Title">
                    </div>
                    <div class="form-group">
                        <label>Summary</label>
                        <textarea name="post_content" id="post_content" rows="10" cols="150" class="form-control" rows="150"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="post_content_1" id="post_content_1" rows="10" cols="150" class="form-control" rows="150"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="image">
                    </div>

                    <div class="form-group">
                        <label>Highlights</label>
                        <label class="radio-inline">
                            <input name="highlights" value="0" checked="" type="radio">Enabled
                        </label>
                        <label class="radio-inline">
                            <input name="highlights" value="1" type="radio">Disabled
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
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
@endpush
{{--Replace the <textarea id="editor1"> with a CKEditor--}}
@push('javascript')
    <script>

        // instance, using default configuration.
        CKEDITOR.replace( 'post_content' );
        CKEDITOR.replace( 'post_content_1' );
    </script>
@endpush
