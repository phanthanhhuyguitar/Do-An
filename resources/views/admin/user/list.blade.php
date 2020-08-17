@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User :
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert-success alert">
                    {{session('thongbao')}}
                </div>
            @endif
            <table class="table table-hover" id="dataTables-example">
                <thead class="thead-light">
                <tr align="center">
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Tên</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Quyền</th>
                    <th scope="col" class="text-center">Xóa</th>
                    <th scope="col" class="text-center">Sửa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $us)
                <tr class="odd gradeX" align="center">
                    <td>{{$us->id}}</td>
                    <td>{{$us->name}}</td>
                    <td>{{$us->email}}</td>
                    <td>
                        @if($us->level == 0)
                        {{"Admin"}}
                        @else
                        {{"Personal"}}
                        @endif

                    </td>
                    <td class="center text-danger "><i class="far fa-trash-alt"></i><a href="{{route('admin.user.delete',['id'=>$us->id])}}">Xóa</a></td>
                    <td class="center text-success"><i class="far fa-edit"></i><a style="margin-left: 3px" href="{{route('admin.user.edit',['id'=>$us->id])}}">Sửa</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row ml-3 my-3">
                {{ $user->links() }}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
