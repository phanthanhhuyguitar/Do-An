@extends('layout.index')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12 col-xl-12 col-md-12 mb-4 mt-4 border p-3">
                <div class="title text-center">
                    <h4>Thông Tin Cá Nhân</h4>
                </div>

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

                <form action="nguoi-dung" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nameUser">Họ tên</label>
                        <input class="form-control" type="text" name="nameUser" placeholder="Họ tên" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="emailUser">Email</label>
                        <input class="form-control" readonly type="email" name="emailUser" value="{{Auth::user()->email}}">
                    </div>
                    <div class="form-group wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass" id="showPassword">
							<i class="fa fa fa-eye mt-4"></i>
						</span>
                        <label for="passUser">Đổi mật khẩu</label>
                        <input type="checkbox" id="changePassword" name="changePassword">
                        <input class="form-control password" disabled type="password" id="password" name="passUser" placeholder="Password">
                    </div>
                    <div class="wrap-input100 form-group validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass" id="showPasswordAgain">
							<i class="fa fa fa-eye mt-4"></i>
						</span>
                        <label for="againPass">Nhập lại mật khẩu</label>
                        <input class="form-control password" disabled type="password" id="passAgain" name="againPass" placeholder="Password">
                    </div>
                    <button class="btn" type="submit"> Lưu </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        // Check javascript has loaded
        $(document).ready(function(){
            // Click event of the showPassword button
            $('#showPassword').on('click', function(){
                // Get the password field
                var passwordField = $('#password');
                // Get the current type of the password field will be password or text
                var passwordFieldType = passwordField.attr('type');
                // Check to see if the type is a password field
                if(passwordFieldType == 'password')
                {
                    // Change the password field to text
                    passwordField.attr('type', 'text');
                    // Change the Text on the show password button to Hide
                    $(this).val('Hide');
                } else {
                    // If the password field type is not a password field then set it to password
                    passwordField.attr('type', 'password');
                    // Change the value of the show password button to Show
                    $(this).val('Show');
                }
            });
        });

        //Nhap lai mat khau
        $(document).ready(function(){
            // Click event of the showPassword button
            $('#showPasswordAgain').on('click', function(){
                // Get the password field
                var passwordField = $('#passAgain');
                // Get the current type of the password field will be password or text
                var passwordFieldType = passwordField.attr('type');
                // Check to see if the type is a password field
                if(passwordFieldType == 'password')
                {
                    // Change the password field to text
                    passwordField.attr('type', 'text');
                    // Change the Text on the show password button to Hide
                    $(this).val('Hide');
                } else {
                    // If the password field type is not a password field then set it to password
                    passwordField.attr('type', 'password');
                    // Change the value of the show password button to Show
                    $(this).val('Show');
                }
            });
        });
        //cho doi mat khau
        $("#changePassword").change(function () {
            if($(this).is(":checked"))
            {
                $(".password").removeAttr('disabled');
            }else{
                $(".password").attr('disabled','');
            }
        })
    </script>
@endpush

