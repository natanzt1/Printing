@extends('header')


@section('content')
	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Home</a>
					</li>
					<li><a href="#">Category</a>
					</li>
					<li>Page active</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->
        @foreach($printings as $printing)
		<div class="container margin_60">
			<div class="main_title">
				<h2><span>{{$printing->nama}}</span></h2>
				<p>
					Detail dari {{$printing->nama}}.
				</p>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<img src="{{ URL::asset('img/tour_box_1.jpg') }}" alt="Image" class="img-responsive styled">
				</div>
				<div class="col-md-7 col-md-offset-1 col-sm-6">
                    <h3>Deskripsi</h3>
                    <h6><span>{{$printing->deskripsi}}</span></h6>
					<h3>Alamat : <span>{{$printing->alamat}}</span></h3>
					<h4>Kota : <span>{{$printing->kabupaten}}</span></h4>

					<div class="general_icons">
						<ul>
							<li><i class="icon_set_1_icon-34"></i>Camera</li>
							<li><i class="icon_set_1_icon-31"></i>Video camera</li>
							<li><i class="icon_set_1_icon-35"></i>Credit cards</li>
							<li><i class="icon_set_1_icon-63"></i>Mobile</li>
							<li><i class="icon_set_1_icon-33"></i>Travel bag</li>
							<li><i class="icon_set_1_icon-9"></i>Snack</li>
							<li><i class="icon_set_1_icon-37"></i>Map</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- End row -->
		<hr>
		<div id="map_contact"></div>
        <!-- end map-->
        @endforeach
	</main>
	<!-- End main -->

	<footer class="revealed">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <h3>Need help?</h3>
                    <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                    <a href="http://www.ansonika.com/cdn-cgi/l/email-protection#066e636a7646656f727f72697374752865696b" id="email_footer"><span class="__cf_email__" data-cfemail="84ece1e8f4c4e7edf0fdf0ebf1f6f7aae7ebe9">[email&#160;protected]</span></a>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                         <li><a href="#">Terms and condition</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>Discover</h3>
                    <ul>
                        <li><a href="#">Community blog</a></li>
                        <li><a href="#">Tour guide</a></li>
                        <li><a href="#">Wishlist</a></li>
                         <li><a href="#">Gallery</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-3">
                    <h3>Settings</h3>
                    <div class="styled-select">
                        <select class="form-control" name="lang" id="lang">
                            <option value="English" selected>English</option>
                            <option value="French">French</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Russian">Russian</option>
                        </select>
                    </div>
                    <div class="styled-select">
                        <select class="form-control" name="currency" id="currency">
                            <option value="USD" selected>USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="RUB">RUB</option>
                        </select>
                    </div>
                </div>
            </div><!-- End row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google"></i></a></li>
                            <li><a href="#"><i class="icon-instagram"></i></a></li>
                            <li><a href="#"><i class="icon-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon-vimeo"></i></a></li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        </ul>
                        <p>© Citytours 2015</p>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div><!-- End Search Menu -->

@endsection