@extends('layout.index')
@section('content')
<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            <!-- Single -->
                            @foreach($slide as $sl)
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="upload/slide/{{$sl->Hinh}}" alt="{!! $sl->NoiDung !!}">
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{$sl->theloai}}</span>
                                            <h2><a href="https://ncov.moh.gov.vn/" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms" target="_blank">{!! $sl->NoiDung !!}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">by Alice cloe   -   {{$sl->created_at}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                        <!-- Trending Top -->
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="assets/img/trending/trending_top5.jpg" alt="">
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgb">THỜI TRANG</span>
                                            <h2><a href="latest_news.html"> Hãy quyết định bạn là ai</a></h2>
                                            <p>by Alice cloe   -   Jun 19, 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="assets/img/trending/trending_top4.jpg" alt="">
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgg">CÔNG NGHỆ </span>
                                            <h2><a href="latest_news.html">Tôi nhìn kỹ thuật bằng con mắt của khách hàng.</a></h2>
                                            <p>by Alice cloe   -   Jun 19, 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-15 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach($cate as $ct)
                        @if(count($ct->typeNews)>0)
                            <div class="whats-news-wrapper mt-20">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-4">
                                <div class="section-tittle mb-30">
                                    <h3>{{$ct->Ten}}</h3>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            @foreach($ct->typeNews as $tn)
                                            <a class="nav-item nav-link" href="loai-tin/{{$tn->id}}/{{$tn->TenKhongDau}}.html">{{$tn->Ten}}</a>
                                            @endforeach
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                        <?php
                                        $data = $ct->news->where('NoiBat', 0)->sortByDesc('created_at')->take(5);
                                        $firstNew = $data->shift();
                                        //shift ham nay la mang nen in ra ta phai in key cua no ra
                                        ?>
                                            <!-- Left Details Caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        @if(isset($firstNew))
                                                        <img src="upload/tintuc/{{$firstNew['Hinh']}}" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="tin-tuc/{{$firstNew['id']}}/{{$firstNew['TieuDeKhongDau']}}.html">{{$firstNew['TieuDe']}}</a></h4>
                                                        <span>{{$firstNew['TieuDe']}}   -   {{$firstNew['created_at']}}</span>
                                                        <p>{!! $firstNew['TomTat'] !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Right single caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    @foreach($data->all() as $new)
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img width="130" height="100" src="upload/tintuc/{{$new['Hinh']}}" alt="{{$new['NoiDung']}}">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">{{$new->typeNews['Ten']}}</span>
                                                                <h4><a href="tin-tuc/{{$new['id']}}/{{$new['TieuDeKhongDau']}}.html">{!! $new['TieuDe'] !!}</a></h4>
                                                                <p>{{$new['created_at']}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card two -->
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            <div class="col-xl-6">
                                                <div class="whats-news-single mb-40">
                                                    <div class="whates-img">
                                                        <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="#">Secretart for Economic Air
                                                                plane that looks like</a></h4>
                                                        <span>by Alice cloe   -   Jun 19, 2020</span>
                                                        <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Right single caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorg">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorr">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card three -->
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            <div class="col-xl-6">
                                                <div class="whats-news-single mb-40">
                                                    <div class="whates-img">
                                                        <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="#">Secretart for Economic Air
                                                                plane that looks like</a></h4>
                                                        <span>by Alice cloe   -   Jun 19, 2020</span>
                                                        <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Right single caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorg">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorr">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card fure -->
                                    <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            <div class="col-xl-6">
                                                <div class="whats-news-single mb-40">
                                                    <div class="whates-img">
                                                        <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="#">Secretart for Economic Air
                                                                plane that looks like</a></h4>
                                                        <span>by Alice cloe   -   Jun 19, 2020</span>
                                                        <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Right single caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorg">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorr">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card Five -->
                                    <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            <div class="col-xl-6">
                                                <div class="whats-news-single mb-40">
                                                    <div class="whates-img">
                                                        <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="#">Secretart for Economic Air
                                                                plane that looks like</a></h4>
                                                        <span>by Alice cloe   -   Jun 19, 2020</span>
                                                        <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Right single caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorg">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorr">FASHION</span>
                                                                <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                <p>Jun 19, 2020</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                    <!-- Banner -->
                    <div class="banner-one mt-20 mb-30">
                        <img src="assets/img/gallery/body_card1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4 mt-20">
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Gần đây nhất</h4>
                        </div>
                        <?php
                        $data = $reCen->where('NoiBat', 0)->sortByDesc('created_at')->take(3);
                        $firstNew = $data->shift();
                        //shift ham nay la mang nen in ra ta phai in key cua no ra
                        ?>
                        <!-- Details -->
                        <div class="most-recent mb-40">
                            <div class="most-recent-img">
                                <img src="upload/tintuc/{{$firstNew['Hinh']}}" alt="">
                                <div class="most-recent-cap">
                                    <h4><a href="tin-tuc/{{$firstNew['id']}}/{{$firstNew['TieuDeKhongDau']}}.html">{!! $firstNew['TieuDe'] !!}</a></h4>
                                    <p>{{$firstNew['created_at']}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        @foreach($data->all() as $dt)
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                <img width="130" src="upload/tintuc/{{$dt['Hinh']}}" alt="">
                            </div>
                            <div class="most-recent-capt">
                                <h4><a href="tin-tuc/{{$dt['id']}}/{{$dt['TieuDeKhongDau']}}.html">{{$dt['TieuDe']}}</a></h4>
                                <p>{{$dt['created_at']}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area pt-50 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-3">
                        <div class="home-banner2 d-none d-lg-block">
                            <img src="assets/img/gallery/body_card2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>Phổ biến nhất</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews1.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
                                            </div>
                                        </div>
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
                                            </div>
                                        </div>
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews3.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
                                            </div>
                                        </div>
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!--  Recent Articles start -->
    <div class="recent-articles pt-80 pb-80">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Tin tức xu hướng</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding1.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="#" > <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4></a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>

                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding2.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding1.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html"> <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4></a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding2.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Recent Articles End -->
    <!-- Start Video Area -->
    <div class="youtube-area video-padding d-none d-sm-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-items-active">
                        <div class="video-items text-center">
                            <iframe width="100%" height="515" src="https://www.youtube.com/embed/videoseries?list=PLElOEy0hA_AD3gCUauXdP2hd7EJ-ak9iu" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-12">
                        <div class="testmonial-nav text-center">
                            <div class="single-video">
                                <iframe width="95%" height="160" src="https://www.youtube.com/embed/oigiXW6XyCQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>View : 41.156.872 lượt xem</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe width="95%" height="160" src="https://www.youtube.com/embed/HsgTIMDA6ps" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>View : 26.146.544 lượt xem</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe width="95%" height="160" src="https://www.youtube.com/embed/0VC6euBtKkk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>View : 59.069.009 lượt xem</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe width="95%" height="160" src="https://www.youtube.com/embed/wElFDsqrL50" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>View : 4.123.124 lượt xem</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Start Video area-->
    <!--   Weekly3-News start -->
    <div class="weekly3-news-area pt-80 pb-130">
        <div class="container">
            <div class="weekly3-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly3-news-active dot-style d-flex">
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News1.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News2.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News3.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News4.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News2.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!-- banner-last Start -->
    <div class="banner-area gray-bg pt-90 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="banner-one">
                        <img src="assets/img/gallery/body_card3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-last End -->
</main>
@endsection
