@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-hea">News
                    <small>List</small>
                    <a class="btn-success btn" href="{{route('admin.news.add')}}">Add <i class="far fa-plus-square"></i></a>
                </h1>
                <div class="ml-auto text-right">

                </div>
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
                    <th class="text-center">Title</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Viewers</th>
                    <th class="text-center">Highlights</th>
                    <th class="text-center">Delete</th>
                    <th class="text-center">Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($new as $ns)
                <tr class="odd gradeX" align="center">
                    <td>{{$ns->id}}</td>
                    <td>
                        <p>{{$ns->TieuDe}}</p>
                        <img width="100px" src="{{asset("upload/tintuc/$ns->Hinh")}}" alt="">
                    </td>
                    <td>{!! strip_tags($ns->TomTat) !!}</td>
                    {{--tro theo ten ham trong model lien ket--}}
                    <td>{{$ns->typeNews->categories->Ten}}</td>
                    <td>{{$ns->typeNews->Ten}}</td>
                    <td>{{$ns->SoLuotXem}}</td>
                    <td>
                        @if($ns->NoiBat == 0)
                            <i class="text-success fas fa-check"></i>
                        @endif
                        @if($ns->NoiBat == 1)
                            <i class="text-danger fas fa-times"></i>
                        @endif
                    </td>
                    <td class="center text-danger"><i class="far fa-trash-alt"></i><a class="ml-1" href="{{route('admin.news.delete',['id'=>$ns->id])}}">Delete</a></td>
                    <td class="center text-info"><i class="far fa-edit"></i><a class="ml-1" href="{{route('admin.news.edit',['id'=>$ns->id])}}">Edit</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row ml-3 my-3">
                {{ $new->links() }}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
