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
				<div class="col-md-12 col-sm-6">
                    <ul class="nav nav-tabs font-14pt">
                        <li class="active"><a data-toggle="tab" href="#detail">Detail</a></li>
                        <li><a data-toggle="tab" href="#layanan">Layanan dan Harga</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="detail" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <img src="{{ URL::asset('img/tour_box_1.jpg') }}" alt="Image" class="img-responsive styled">
                                </div>
                                
                                <div class="col-md-5 col-sm-5" style="word-wrap:break-word">
                                    <h4>Deskripsi</h4>
                                    <h5><span>{{$printing->deskripsi}}</span></h5><br>
                                    <h4>Alamat : <span>{{$printing->alamat}}</span></h4>
                                    <h4>Kota : <span>{{$printing->kabupaten}}</span></h4>
                                    <h4>Rating :                        
                                        <span class="rating">
                                            @for($star=0 ; $star< 5; $star++ )
                                                @if($star<($printing->rating))
                                                    <i class="icon-star voted"></i>
                                                @else
                                                    <i class=" icon-star-empty"></i>
                                                @endif
                                            @endfor
                                        </span> 
                                        ({{$printing->rating}} of 5)
                                    </h4>
                                    <hr>
                                </div>
                                @guest
                                <div class="col-md-3 col-sm-3">
                                    <h5>Ingin Menambahkan Printing ini ke 
                                        <br><span>Daftar Favoritemu dan Melakukan Transaksi?</span> Yuk login dulu 
                                        <i class="icon-smile voted"></i>
                                    </h5>
                                </div>
                                @endguest
                                @auth('web')
                                <div class="col-md-3 col-sm-3">
                                    <a class="btn_full_outline" href="#"><i class=" icon-heart"></i> Add to Favorite</a>
                                    <br><br><br><br><br><br><br>
                                    <a class="btn_full_outline_2" href="{{route('member.transaksi', ['printing_id' => $printing_id])}}">Lakukan Transaksi</a>
                                </div>
                                @endauth
                                <!--Favorite Button-->
                            </div>
                        </div>

                        <div id="layanan" class="tab-pane fade">
                            <ul class="nav nav-tabs font-12pt">
                        @foreach($jenis_layanans as $i=>$layanan)
                            @if($i==0)
                            <li class="active"><a data-toggle="tab" href="#{{$layanan->id}}">{{$layanan->jenis_printing}}</a></li>
                            @else
                            <li><a data-toggle="tab" href="#{{$layanan->id}}">{{$layanan->jenis_printing}}</a></li>
                            @endif
                        @endforeach
                        </ul>

                        <div class="tab-content">
                            @foreach($jenis_layanans as $j=>$layanan)
                            @if($j==0)
                            <div id="{{$layanan->id}}" class="tab-pane fade in active">

                            @else
                            <div id="{{$layanan->id}}" class="tab-pane fade">
                            @endif
                                <div style="width: 90% ; margin-left: 5%" align="center">
                                    <h4>
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                              <th scope="col">Jenis Kertas</th>
                                              <th scope="col">Ukuran Kertas</th>
                                              <th scope="col">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($detail_layanans as $detail)
                                        @if($detail->layanan_tersedia_id == $layanan->id)
                                            <tr>
                                                <td>{{$detail->jenis_kertas}}</td>
                                                <td>{{$detail->ukuran_kertas}}</td>
                                                <td>Rp {{$detail->harga}}</td>
                                            </tr>
                                        @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
			</div>
			<!-- End row -->
        </div>
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
