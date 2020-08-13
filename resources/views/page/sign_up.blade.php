@extends('layout.index')
@section('content')
    <body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-30">
                <form class="login100-form validate-form" action="{{route('handle-user-sign-up')}}" method="post">
                    @csrf
                    <span class="login100-form-title p-b-30">
						ĐĂNG KÝ
					</span>

                    @if(count($errors)>0)
                        <div class="alert alert-danger mt-10">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success mt-10">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="wrap-input100 validate-input m-b-16">
                        <input class="input100" type="text" name="nameU" id="nameUser" placeholder="Nhập họ tên của bạn">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16">
                        <input class="input100" type="email" name="emailU" id="emailUser" placeholder="Nhập email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-20">
						<span class="btn-show-pass" id="showPassword">
							<i class="fa fa fa-eye"></i>
						</span>
                        <input class="input100" type="password" id="password" name="pass" placeholder="Nhập mật khẩu">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-20">
                        <span class="btn-show-pass" id="showPassAgain">
							<i class="fa fa fa-eye"></i>
						</span>
                        <input class="input100" type="password" id="passAgain" name="passAgain" placeholder="Nhập lại mật khẩu">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Đăng Ký
                        </button>
                    </div>
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

            //nhap lai mat khau
            $(document).ready(function(){
                // Click event of the showPassword button
                $('#showPassAgain').on('click', function(){
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
        </script>
    @endpush
