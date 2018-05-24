@extends('header')


@section('content')
    <br><br>
	<main>
		<div class="margin_60 container" style="padding: 5%">
            <div class="main_title">
                <h2>Profile <span>Anda</span> </h2>
            </div>
			<div class="row" style="background-color: #FFF ; padding: 5%">
                <div class="col-md-6 col-sm-6">
                    <h3><span>Data Diri</span></h3>
                    <h5>Anda tidak dapat mengubah data <span>Username</span> dan <span>Email</span>.</h5><br>
                    <form method="POST" action="/printing/profile/edit" enctype="multipart/form-data">
                        @csrf
                        @if(isset($profile->nama))
                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label><br>
                            <input type="text" class="form-control" name="nama" value="{{$profile->nama}}" required>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="Nama2">Nama Lengkap</label><br>
                            <input type="text" class="form-control" name="nama" placeholder="Isi Nama anda" required>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="Email">Email address</label><br>
                            <input type="email" class="form-control" name="email" value="{{$profile->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Username">Username</label><br>
                            <input type="text" class="form-control" name="username" value="{{$profile->username}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label><br>
                            <input type="textarea" rows="4" class="form-control" name="deskripsi" value="{{$profile->deskripsi}}">
                        </div>
                        <div class="form-group">
                            <label for="Upload Foto">Upload foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <input type="submit" value="Edit Profile" class="btn btn-primary">
                    </form>
                </div>
                <div class="col-md-6 col-sm-6">
                    @if($profile->foto == null)
                    <img src="{{ URL::asset('storage/member_profile/avatar_default.png') }}" alt="Image" class="img-responsive styled profile_pic" style="min-height: 200px; max-width: 500px; max-height: 250px">
                    @else
                    <img src="{{ URL::asset($profile->foto) }}" alt="Image" class="img-responsive styled profile_pic" style="min-height: 200px; max-width: 500px; max-height: 250px">
                    @endif
                </div>
            </div>
            <div class="divider"></div>
		</div>
			<!-- end container -->
	</main>
	<!-- End main -->

	<footer class="revealed">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <h3>Need help?</h3>
                    <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                    <a href="http://www.ansonika.com/cdn-cgi/l/email-protection#a9c1ccc5d9e9cac0ddd0ddc6dcdbda87cac6c4" id="email_footer"><span class="__cf_email__" data-cfemail="452d20293505262c313c312a3037366b262a28">[email&#160;protected]</span></a>
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