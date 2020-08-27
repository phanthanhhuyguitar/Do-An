<?php namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;
class LoginController extends Controller {
    /*
        |--------------------------------------------------------------------------
        | Login Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles authenticating users for the application and
        | redirecting them to your home screen. The controller uses a trait
        | to conveniently provide its functionality to your applications.
        |
        */
    use AuthenticatesUsers;
    /*** Where to redirect users after login.
     ** @var string
     */
    protected $redirectTo = '/trang-chu';
    /*** Create a new controller instance.
     * * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback() {
        echo 'phan huy';
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/trang-chu');
            } else {
                $newUser = User::create(['name' => $user->name, 'email' => $user->email, 'facebook_id' => $user->id]);
                Auth::login($newUser);
                return redirect()->back();
            }
        }
        catch(Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
?>
