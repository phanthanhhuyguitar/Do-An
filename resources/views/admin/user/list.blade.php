@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex">
                <h1 class="page-header w-auto">User :
                    <small>Danh sách</small>
                </h1>
                <div class="ml-auto mt-2">
                    <a href="{{ route('admin.export') }}" class="btn btn-success">Export Excel</a>
                </div>
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
                    <th scope="col" class="text-center">Avatar</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Quyền</th>
                    <th scope="col" class="text-center">Xóa</th>
                    <th scope="col" class="text-center">Sửa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $us)
                <tr class="odd gradeX" align="center">
                    <td class="align-middle">{{$us->id}}</td>
                    <td class="align-middle">{{$us->name}}</td>
                    <td><img width="80" style="border-radius: 50%" src="{{asset("upload/avatar/$us->Hinh")}}" alt=""></td>
                    <td class="align-middle">{{$us->email}}</td>
                    <td class="align-middle">
                        @if($us->level == 0)
                        {{"Admin"}}
                        @else
                        {{"Personal"}}
                        @endif

                    </td>
                    <td class="center align-middle text-danger "><i class="far fa-trash-alt"></i><a href="{{route('admin.user.delete',['id'=>$us->id])}}">Xóa</a></td>
                    <td class="center align-middle text-success"><i class="far fa-edit"></i><a style="margin-left: 3px" href="{{route('admin.user.edit',['id'=>$us->id])}}">Sửa</a></td>
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
