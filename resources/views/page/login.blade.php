@extends('layout.index')
@section('content')
    <body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-30 p-b-30">
                <form class="login100-form validate-form" action="{{route('handle-user-login')}}" method="post">
                    @csrf
					<span class="login100-form-title p-b-40">
						Login
					</span>

                    <div>
                        <a href="{{ url('/auth/redirect/facebook') }}" class="btn-login-with bg1 m-b-10">
                            <i class="fa fa-facebook-official"></i>
                            Login with Facebook
                        </a>

                        <a href="#" class="btn-login-with bg2">
                            <i class="fa fa-twitter"></i>
                            Login with Twitter
                        </a>
                    </div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger mt-10">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-danger mt-10">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="text-center p-t-20 p-b-20">
						<span class="txt1">
							Login with email
						</span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email: ex@abc.xyz">
                        <input class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass" id="showPassword">
							<i class="fa fa fa-eye"></i>
						</span>
                        <input class="input100" type="password" id="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="flex-col-c p-t-10">
						<span class="txt2 p-b-10">
							Don’t have an account?
						</span>

                        <a href="#" class="txt3 bo1 hov1">
                            Sign up now
                        </a>
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
    </script>
@endpush
