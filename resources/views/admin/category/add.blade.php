@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
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
                <form action="{{route('admin.category.handle.add')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại :</label>
                        <input class="form-control" name="cateName" placeholder="Nhập tên thể loại" />
                    </div>
                    <div class="form-group">
                        <label for="desc-category">Mô tả danh mục :</label>
                        <textarea style="resize: none" name="cate_product_desc" class="form-control" id="desc-category" rows="8" placeholder="Mô tả danh mục"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="desc-category">Từ khóa danh mục :</label>
                        <textarea style="resize: none" name="cate_product_keyword" class="form-control" id="desc-category" rows="8" placeholder="Từ khóa danh mục"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Xóa</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
