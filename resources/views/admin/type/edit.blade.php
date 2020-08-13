@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News Type
                    <small>{{$tyPe -> Ten}}</small>
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
                <form action="{{route('admin.type.handle.edit',['id'=>$tyPe->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            @foreach($caTe as $ct)
                                <option
                                {{--ta xet dieu kien cho hai cai id bang nhau--}}
                                    @if($tyPe->idTheLoai == $ct->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$ct->id}}">{{$ct->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>News Name</label>
                        <input class="form-control" value="{{$tyPe->Ten}}" name="newsName" placeholder="Please Enter News Type Name">
                    </div>

                    <button type="submit" class="btn btn-success">Edit</button>
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
