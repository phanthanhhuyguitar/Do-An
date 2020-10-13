@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại :
                    <small>{{$cate->Ten}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert-success alert">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form action="{{route('admin.category.edit',['id' => $cate->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại :</label>
                        <input class="form-control" value="{{$cate->Ten}}" name="cateName" placeholder="Please Enter Category Name" >
                    </div>
                    <div class="form-group">
                        <label for="desc-category">Mô tả danh mục :</label>
                        <textarea style="resize: none" name="cate_product_desc" value="{{$cate->meta_desc}}" class="form-control" id="desc-category" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="desc-category">Từ khóa danh mục :</label>
                        <textarea style="resize: none" name="cate_product_keyword" value="{{$cate->meta_keywords}}" class="form-control" id="desc-category" rows="8"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Sửa</button>
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
