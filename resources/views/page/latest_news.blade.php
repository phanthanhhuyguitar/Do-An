@extends('layout.index')
@section('content')
    <main>

        <!--================Blog Area =================-->
        <section class="blog_area single-post-area pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="heading-news mb-30 pt-30">
                            <h3>{{$news->TieuDe}}</h3>
                            <p class="date mt-3">{{$news->created_at}}</p>
                        </div>
                        <div class="single-post">
                            <div>
                                <h2 class="font-weight-bold">{!! $news->TomTat !!}</h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-user"></i> {{$news->typeNews->Ten}}</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i>{{count($news->comment)}} Bình luận</a></li>
                                </ul>
                                <p class="excert">{!! $news->NoiDung !!}</p>
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <ins class="adsbygoogle"
                                     style="display:block; text-align:center;"
                                     data-ad-layout="in-article"
                                     data-ad-format="fluid"
                                     data-ad-client="ca-pub-6041994811184344"
                                     data-ad-slot="7182189202"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                        </div>
                        <div class="navigation-top">
                            <div class="d-sm-flex justify-content-between text-center">
                                <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily và 4
                                    người thích điều này</p>
                                <div class="col-sm-4 text-center my-2 my-sm-0">
                                    <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                                </div>
                                {{--nut like--}}
                                <div class="d-block">
                                    <div class="fb-like" data-href="{{$canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
                                    {{--nut share--}}
                                    <div class="fb-share-button" data-href="http://localhost:8000/trang-chu" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                                </div>
                            </div>
                            <div class="navigation-area">
                                <div class="row">
                                    @if(!empty($previou))
                                    <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href="tin-tuc/{{$previou->id}}/{{$previou->TieuDeKhongDau}}.html">
                                                <img style="height:100%;width: 100%" class="img-fluid" src="upload/tintuc/{{$previou->Hinh}}" alt="">
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>Tin trước</p>
                                            <a href="tin-tuc/{{$previou->id}}/{{$previou->TieuDeKhongDau}}.html">
                                                <h4>{{$previou->TieuDe}}</h4>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($nexts))
                                        <div
                                        class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p>Tin sau</p>
                                            <a href="tin-tuc/{{$nexts->id}}/{{$nexts->TieuDeKhongDau}}.html">
                                                <h4>{{$nexts->TieuDe}}</h4>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="tin-tuc/{{$nexts->id}}/{{$nexts->TieuDeKhongDau}}.html">
                                                <img style="height:100%;width: 100%" class="img-fluid" src="upload/tintuc/{{$nexts->Hinh}}" alt="">
                                            </a>
                                        </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="comments-area">
                            <h4>{{count($news->comment)}} Bình luận</h4>
                            @foreach($news->comment as $nsc)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            @if(empty($nsc->user->Hinh))
                                                <img src="assets/img/comment/default-avatar.png" alt="">
                                            @else
                                                <img src="upload/avatar/{{$nsc->user->Hinh}}" alt="">
                                            @endif
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                {{$nsc->NoiDung}}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">{{$nsc->user->name}}</a>
                                                    </h5>
                                                    <p class="date">{{$nsc->created_at}}</p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if(Auth::user())
                            <div class="comment-form">
                            <h4>BÌNH LUẬN</h4>
                                @if(session('thongbao'))
                                    {{session('thongbao')}}
                                @endif
                            <form method="post" class="form-contact comment_form" action="comment/{{$news->id}}" id="commentForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                        placeholder="Viết bình luận"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Gửi</button>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            @include('layout.sidebar')
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Tin gần đây</h3>
                                @foreach($recent as $rc)
                                    <div class="media post_item">
                                    <img width="80px" src="upload/tintuc/{{$rc->Hinh}}" alt="post">
                                    <div class="media-body">
                                        <a href="single-blog.html">
                                            <h3>{{substr($rc->TieuDe, 0, 50)}}</h3>
                                        </a>
                                        <p>{{$rc->created_at}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </aside>
                            <aside class="single_sidebar_widget tag_cloud_widget">
                                <h4 class="widget_title">Tag Clouds</h4>
                                <ul class="list">
                                    <li>
                                        <a href="#">project</a>
                                    </li>
                                    <li>
                                        <a href="#">love</a>
                                    </li>
                                    <li>
                                        <a href="#">technology</a>
                                    </li>
                                    <li>
                                        <a href="#">travel</a>
                                    </li>
                                    <li>
                                        <a href="#">restaurant</a>
                                    </li>
                                    <li>
                                        <a href="#">life style</a>
                                    </li>
                                    <li>
                                        <a href="#">design</a>
                                    </li>
                                    <li>
                                        <a href="#">illustration</a>
                                    </li>
                                </ul>
                            </aside>
                            <aside class="single_sidebar_widget instagram_feeds">
                                <h4 class="widget_title">Instagram Feeds</h4>
                                <ul class="instagram_row flex-wrap">
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </aside>
                            <aside class="single_sidebar_widget newsletter_widget">
                                <h4 class="widget_title">Phản hồi</h4>
                                <form action="#">
                                    <div class="form-group">
                                        <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                            type="submit">Gửi</button>
                                </form>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Blog Area end =================-->
    </main>
@endsection
