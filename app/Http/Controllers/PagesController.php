<?php

namespace App\Http\Controllers;

use App\Login;
use App\Social;
use App\User;
use App\UserView;
use Illuminate\Http\Request;
use App\Model\Categories;
use App\Model\Slider;
use App\Model\TypeNews;
use App\Model\News;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Session;

class PagesController extends Controller
{
    //ham do du lieu ra view
    public function __construct()
    {
        $cate = Categories::all();
        $slide = Slider::all();
        view()->share('cate',$cate);
        view()->share('slide',$slide);

        if(Auth::check()){
            view()->share('customer', Auth::user());//tra ve doi tuong nguoi dung dang nhap truyen sang bien nguoi dung
        }
    }

    public function home(Request $request)
    {
        $meta_desc = "Trang tin tức giải trí - xã hội Việt Nam - Quốc Tế. Đưa tin nhanh nhất : thời trang, video ngôi sao, phim ảnh, tình yêu, học đường, các chuyển động xã hội.";
        $meta_keywords = "teen viet nam, giới trẻ, xu hướng, âm nhạc, xem phim, đời sống, hàng hiệu, chuyện lạ, thời trang trẻ, mới lớn, đang yêu, sành điệu, chuyện cười, khéo tay, các sao";
        $meta_title = "Trang cung cấp thông tin chính thống";
        $url_canonical = $request->url();
        $recently = News::all();
        //return view('page.home', ['reCen' => $recently], ['desc' => $meta_desc], ['keyword' => $meta_keywords], ['title' => $meta_title], ['canonical' => $url_canonical]);
        //thay url
        return view('page.home')
                ->with('reCen', $recently)
                ->with('desc', $meta_desc)
                ->with('keyword', $meta_keywords)
                ->with('title', $meta_title)
                ->with('canonical', $url_canonical);
    }

    public function blog()
    {
        return view('page.blog');
    }

    public function contact()
    {
        return view('page.contact_cv');
    }

    public function typeNews($id)
    {
        $type = TypeNews::find($id);
        $new = News::where('idLoaiTin', $id)
                    ->paginate(6);
        return view('page.type_news', ['tyPe'=>$type, 'news'=>$new]);
    }

    public function new(Request $request, $id)
    {
        $new = News::find($id);

        $meta_keywords = $new->meta_keywords;//error
        $meta_title = $new->Ten;//error
        $meta_desc = $new->meta_desc;//error
        $url_canonical = $request->url();
        $previous = News::find(--$id);
        $id+=2;
        $next = News::find($id);
        $recentPost = News::where('NoiBat', 0)
                            ->orderBy('created_at', 'desc')
                            ->take(4)
                            ->get();
        return view('page.latest_news', [
            'news'=>$new,
            'recent'=>$recentPost,
            'previou'=>$previous,
            'nexts'=>$next
        ])  ->with('desc', $meta_desc)
            ->with('keyword', $meta_keywords)
            ->with('title', $meta_title)
            ->with('canonical', $url_canonical);
    }

    public function about()
    {
        return view('page.about');
    }

    public function category(Request $request, $id)
    {
        $cate = Categories::find($id);
        $meta_keywords = $cate->meta_keywords;
        $meta_title = $cate->Ten;
        $meta_desc = $cate->meta_desc;
        $url_canonical = $request->url();
        return view('page.category', ['caTe'=>$cate])
                ->with('desc', $meta_desc)
                ->with('keyword', $meta_keywords)
                ->with('title', $meta_title)
                ->with('canonical', $url_canonical);
    }

    public function getLogin()
    {
        return view('page.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'pass' => 'required|min:3|max:32'
        ],
            [
                'email.required' => 'Ban chua nhap Email',
                'pass.required' => 'Ban chua nhap mat khau',
                'pass.min' => 'Mat khau phai it nhat 3 ki tu',
                'pass.max' => 'Mat khau phai toi da 32 ki tu',

            ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->pass])) {
            $user = User::whereemail($request->email)
                        ->first();
            Auth::login($user);
            return redirect(route('home'));
        } else{
            return redirect(route('user-login'))->with('thongbao','Email or Password khong chinh xac');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect(route('home'));
    }

    public function getUser()
    {
        return view('page.user');
    }

    public function postUser(Request $request)
    {
        $this->validate($request, [
            'nameUser' => 'required|min:3',
        ],
            [
                'nameUser.required' => 'Ban chua nhap ten nguoi dung',
                'nameUser.min' => 'Ten phai it nhat 3 ky tu',
            ]);

        $user = Auth::user();
        $user->name = $request->nameUser;
        if($request->changePassword == "on"){

            $this->validate($request, [
                'passUser' => 'required|min:3|max:32',
                'againPass' => 'required|same:passUser'
            ],
                [
                    'passUser.required' => 'Ban chua nhap mat khau',
                    'passUser.min' => 'Mat khau phai it nhat 3 ki tu',
                    'passUser.max' => 'Mat khau phai toi da 32 ki tu',
                    'againPass.required' => 'Ban chua nhap lai mat khau',
                    'againPass.same' => 'Hai mat khau khong trung nhau'

                ]);

            $user->password = bcrypt($request->passUser); //bcrypt: ma hoa mat khau
        }
        $user->save();
        return redirect(route('user-info'))->with('thongbao', 'Sua thanh cong');
    }

    public function newFeed()
    {
        $newFeed = News::where('NoiBat', 0)
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->paginate(5);
        return view('page.new', ['newF'=>$newFeed]);
    }

    public function getSignUp()
    {
        return view('page.sign_up');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'nameU' => 'required|min:3',
            'emailU' => 'required|email|unique:users,email',
            'pass' => 'required|min:3|max:32',
            'passAgain' => 'required|same:pass'
        ],
            [
                'nameU.required' => 'Ban chua nhap ten nguoi dung',
                'nameU.min' => 'Ten phai it nhat 3 ky tu',
                'emailU.required' => 'Ban chua nhap email',
                'emailU.email' => 'Ban phai nhap dung dinh dang email',
                'emailU.unique' => 'Email da ton tai',
                'pass.required' => 'Ban chua nhap mat khau',
                'pass.min' => 'Mat khau phai it nhat 3 ki tu',
                'pass.max' => 'Mat khau phai toi da 32 ki tu',
                'passAgain.required' => 'Ban chua nhap lai mat khau',
                'passAgain.same' => 'Hai mat khau khong trung nhau'

            ]);

        $user = new User();
        $user->name = $request->nameU;
        $user->email = $request->emailU;
        $user->password = bcrypt($request->pass); //bcrypt: ma hoa mat khau
        $user->level = 1;//nguoi dung
        $user->save();

        return redirect(route('user-sign-up'))->with('thongbao','Them tai khoan thanh cong');
    }

    public function getSearch(Request $request)
    {
        $key = $request->get('keySearch');
        $new = News::where('TieuDe','like',"%$key%")
                    ->orwhere('TomTat','like',"%$key%")
                    ->orwhere('NoiDung', 'like',"%$key%")
                    ->take(30)
                    ->paginate(6);
        return view('page.search', ['new' => $new, 'key' => $key]);
    }

    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook()
    {
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){

            $account_name = Login::where('id',$account->user_id)->first();
            Auth::loginUsingId($account_name->id);
//            auth()->loginUsingId();
            return redirect(route('home'));//->with('message', 'Đăng nhập Admin thành công')
        }else{

            $huy = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook',
            ]);

            $orang = Login::where('email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'name' => $provider->getName(),
                    'email' => $provider->getEmail(),
                    'password' => '',
                    'level' => '1',
                    'Hinh' => ''

                ]);
            }
            $huy->login()->associate($orang);
            $huy->save();

            $account_name = Login::where('id',$account->user_id)->first();
            //dang nhap bang id
            Auth::loginUsingId($account_name->id);

            return redirect('/trang-chu');//->with('message', 'Đăng nhập Admin thành công')
            //doi https trong app facebook de dung duoc dang nhap cho nguoi khac
        }

    }

}
