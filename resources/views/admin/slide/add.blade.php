@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
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

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="{{route('admin.slide.handle.add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="post_content_1" id="post_content_1" rows="10" cols="150" class="form-control" rows="150"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" name="category" placeholder="Please Enter Category">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" name="image">
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
    <script>
        // instance, using default configuration.
        CKEDITOR.replace( 'post_content' );
        CKEDITOR.replace( 'post_content_1' );
    </script>
@endpush
