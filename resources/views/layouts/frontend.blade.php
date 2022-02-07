<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>The News Reporter</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/font/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/font/font.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/responsive.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/jquery.bxslider.css') }}"
        media="screen" />
</head>

<body>
    <div class="body_wrapper">
        <div class="center">
            <div class="header_area">
                <div class="logo floatleft"><a href="#"><img src="{{ asset('frontend/images/logo.png') }}" alt="" /></a>
                </div>
                <div class="top_menu floatleft">
                    <ul>
                        <li><a href="https://wa.me/6285795290778">Contact us</a></li>
                        <li><a href="https://www.instagram.com/silviaa_sisill/">Follow Me</a></li>
                        <li><a href="login">Login</a></li>
                    </ul>
                </div>
                <div class="social_plus_search floatright">
                    <div class="social">
                    </div>
                    <br>
                    <div class="search">
                        <form action="/kategori" method="post" id="search_form">
                            <input type="text" value="Search news" id="s" />
                            <input type="submit" id="searchform" value="search" />
                            <input type="hidden" value="post" name="post_type" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="main_menu_area">
                <ul id="nav">

                    <ul id="nav">
                        @foreach ($kategori as $data)

                        <li><a href="{{ route('frontend.show', $data->slug) }}">{{ $data->nama_kategori }}</a>
                            {{-- <ul>
                                <li><a href="#">Single item</a></li>
                                <li><a href="#">Single item</a></li>
                                <li><a href="#">Single item</a></li>
                                <li><a href="#">Single item</a></li>
                                <li><a href="#">Single item</a></li>
                            </ul> --}}
                        </li>
                        @endforeach


                    </ul>
            </div>
            <div class="slider_area">
                <div class="slider">
                    <ul class="bxslider">
                        <li><img src="{{ asset('frontend/images/1.jpg') }}" alt="" title="Slider caption text" /></li>
                        <li><img src="{{ asset('frontend/images/2.jpg') }}" alt="" title="Slider caption text" /></li>
                        <li><img src="{{ asset('frontend/images/3.jpg') }}" alt="" title="Slider caption text" /></li>
                    </ul>
                </div>
            </div>
            <div class="content_area">
                <div class="main_content floatleft">
                    <div class="left_coloum floatleft">
                        <div class="single_left_coloum_wrapper">
                            <h2 class="title">Terbaru</h2>
                            @foreach ($beritaTerbaru as $data)
                                <div class="single_left_coloum floatleft"> <img src="{{ $data->image() }}" alt=""
                                        class="img-responsive" />
                                    <h3>{{ $data->judul }}</h3>
                                    <p>{{ Str::limit($data->isi, 20, '...') }}</p>
                                    <p>{{ \Carbon\Carbon::parse($data->tanggal)->diffForHumans() }}</p>

                                    <a class="readmore" href="{{ route('berita.show', $data->id) }}">read more</a>
                                </div>
                            @endforeach

                        </div>
                        <div class="single_left_coloum_wrapper single_cat_left">
                            <div class="footer_bottom_area">
                                <center>
                                    <div class="footer_menu">
                                        <ul id="f_menu">
                                            <li><a href="#">Terbaru</a></li>
                                            <li><a href="#">Olahraga</a></li>
                                            <li><a href="#">Politik</a></li>
                                            <li><a href="#">Edukasi</a></li>
                                            <li><a href="#">Tips & Trik</a>
                                            <li><a href="#">Ekonomi & Bisnis</a>
                                            <li><a href="#">Berita Dunia</a>
                                        </ul>
                                    </div>
                                </center>
                               <center> <div class="copyright_text">
                                    <p>Copyright &copy; 2022 The News Reporter Inc. All rights reserved | Design by <a
                                            target="_blank" rel="nofollow"
                                            href="http://www.graphicsfuel.com/2045/10/wp-magazine-theme-template-psd/">Silvia</a>
                                    </p>
                                </div></center>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="sidebar floatright">
                            <div class="single_sidebar">
                                <h2 class="title">Iklan</h2>
                                <img src="{{ asset('frontend/images/add2.png') }}" alt="" />
                            </div>
                            <div class="single_sidebar">
                            <div class="single_sidebar"> <img src="{{ asset('frontend/images/add1.png') }}" alt="" />
                            </div>
                        </div>
                        </div>
            <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery-min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.bxslider.js') }}"></script>
            <script type="text/javascript" src="{{ asset('frontend/assets/js/selectnav.min.js') }}"></script>
            <script type="text/javascript">
                selectnav('nav', {
                    label: '-Navigation-',
                    nested: true,
                    indent: '-'
                });
                selectnav('f_menu', {
                    label: '-Navigation-',
                    nested: true,
                    indent: '-'
                });
                $('.bxslider').bxSlider({
                    mode: 'fade',
                    captions: true
                });
            </script>
</body>

</html>
