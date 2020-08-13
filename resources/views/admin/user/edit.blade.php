@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>{{$user->name}}</small>
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
                <form action="{{route('admin.user.handle.edit', ['id'=>$user->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" value="{{$user->name}}" name="name" placeholder="Please Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" readonly value="{{$user->email}}" class="form-control" name="email" placeholder="Please Enter Your Email">
                    </div>
                    <div class="form-group">
                        <label>Change Password</label>
                        <input type="checkbox" id="changePassword" name="changePassword">
                        <input type="password" disabled class="form-control password" name="password" placeholder="Please Enter Your Password">
                    </div>
                    <div class="form-group">
                        <label>Enter the password</label>
                        <input type="password" disabled class="form-control password" name="passwordAgain" placeholder="Please Enter the password">
                    </div>
                    <div class="form-group">
                        <label>Power</label>
                        <label for="ad" class="radio-inline">
                            <input type="radio" id="ad" name="power" value="0"
                               @if($user->level == 0)
                                   {{"checked"}}
                               @endif
                            >Admin
                        </label>
                        <label for="pn" class="radio-inline">
                            <input type="radio" id="pn" name="power" value="1"
                            @if($user->level == 1)
                                {{"checked"}}
                                @endif
                            >Personal
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }else{
                    $(".password").attr('disabled','');
                }
            })

        })
    </script>

@endpush
