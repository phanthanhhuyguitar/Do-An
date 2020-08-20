@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại tin :
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
                <thead>
                <tr align="center">
                    <th class="text-center">ID</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Slug</th>
                    <th class="text-center">Thể loại</th>
                    <th class="text-center">Xóa</th>
                    <th class="text-center">Sửa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tyPe as $tp)
                <tr class="odd gradeX" align="center">
                    <td class="align-middle">{{$tp->id}}</td>
                    <td class="align-middle">{{$tp->Ten}}</td>
                    <td class="align-middle">{{$tp->TenKhongDau}}</td>
                    <td class="align-middle">
                        {{$tp->categories->Ten}}
                    </td>
                    <td class="center align-middle text-danger "><i class="far fa-trash-alt"></i><a href="{{route('admin.type.delete',['id'=>$tp->id])}}"> Delete</a></td>
                    <td class="center align-middle text-success"><i class="far fa-edit"></i><a href="{{route('admin.type.edit',['id'=>$tp->id])}}">Edit</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row ml-3 my-3">
                {{ $tyPe->links() }}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
