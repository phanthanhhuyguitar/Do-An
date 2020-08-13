@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>List</small>
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
                    <th class="col" class="text-center">ID</th>
                    <th class="col" class="text-center">Name</th>
                    <th class="col" class="text-center">Content</th>
                    <th class="col" class="text-center">Image</th>
                    <th class="col" class="text-center">Category</th>
                    <th class="col" class="text-center">Delete</th>
                    <th class="col" class="text-center">Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slide as $sl )
                <tr class="odd gradeX" align="center">
                    <th scope="row">{{$sl->id}}</th>
                    <td>{{$sl->Ten}}</td>
                    <td>{{$sl->NoiDung}}</td>
                    <td>
                        <img width="350px" src="{{asset("upload/slide/$sl->Hinh")}}" alt="">
                    </td>
                    <td>{{$sl->theloai}}</td>
                    <td class="center text-danger"><i class="far fa-trash-alt"></i><a style="margin-left: 3px" href="{{route('admin.slide.delete',['id'=>$sl->id])}}">Delete</a></td>
                    <td class="center text-primary"><i class="far fa-edit"></i><a style="margin-left: 3px" href="{{route('admin.slide.edit',['id'=>$sl->id])}}">Edit</a></td>
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
