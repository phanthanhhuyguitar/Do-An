@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide :
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert-success alert">
                    {{session('thongbao')}}
                </div>
            @endif
            <table class="table table-striped table-hover" id="dataTables-example">
                <thead class="thead-list">
                <tr align="center">
                    <th class="text-center">ID</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Nội dung</th>
                    <th class="text-center">Hình ảnh</th>
                    <th class="text-center">Danh mục</th>
                    <th class="text-center">Xóa</th>
                    <th class="text-center">Sửa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slide as $sl )
                <tr class="odd gradeX" align="center">
                    <td>{{$sl->id}}</td>
                    <td>{{$sl->Ten}}</td>
                    <td>{!! $sl->NoiDung !!}</td>
                    <td>
                        <img width="350px" src="{{asset("upload/slide/$sl->Hinh")}}" alt="">
                    </td>
                    <td>{{$sl->theloai}}</td>
                    <td class="center text-danger"><i class="far fa-trash-alt"></i><a style="margin-left: 3px" href="{{route('admin.slide.delete',['id'=>$sl->id])}}">Xóa</a></td>
                    <td class="center text-success"><i class="far fa-edit"></i><a style="margin-left: 3px" href="{{route('admin.slide.edit',['id'=>$sl->id])}}">Sửa</a></td>
                </tr>
                 @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row ml-3 my-3">
                {{ $slide->links() }}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
