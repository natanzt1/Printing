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
		<!-- End position -->

		<div class="container margin_60">
            <div class="main_title">
                <h2>Transaksi <span>Anda</span></h2>
            </div>
			<div class="row">
				<div class="col-md-12" style="min-height: 375px;">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#cart">Cart Anda</a></li>
                        <li><a data-toggle="tab" href="#belum-dibayar">Belum Dibayar</a></li>
                        <li><a data-toggle="tab" href="#sudah-dibayar">Sudah Dibayar</a></li>
                        <li><a data-toggle="tab" href="#selesai">Selesai</a></li>
                        <li><a data-toggle="tab" href="#dibatalkan">Dibatalkan</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="cart" class="tab-pane fade in active">
                            @foreach($cart_0 as $cart)
                            @if(is_object($cart[0]))
                            $total = 0;
                            <table class="table table-striped cart-list add_bottom_30">
                                <h4>{{$cart[0]->nama_printing}}</h4>
                                <thead>
                                    <tr>
                                        <th>Jenis Cetak</th>
                                        <th>Jumlah Halaman</th>
                                        <th>Jumlah Cetak</th>
                                        <th>File</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $trx0)
                                            <tr>
                                                <td>
                                                    {{$trx0->jenis_printing, $trx0->jenis_kertas, $trx0->ukuran_kertas}}
                                                </td>
                                                <td>
                                                    <p>{{$trx0->jumlah_halaman}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$trx0->jumlah_cetak}}</p>
                                                </td>
                                                <td>
                                                    <form action="{{route('member.download')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="path" value="{{$trx0->file}}">
                                                        <input type="submit" value="Download" class="btn btn-primary">
                                                    </form>
                                                </td>
                                                <td>
                                                    Rp{{$trx0->harga}}
                                                </td>
                                                <td>
                                                    <strong>Rp{{$trx0->total}}</strong>
                                                    <?php $total = $total + $trx0->total; ?>
                                                </td>
                                                <td class="options">
                                                    <a href="#"><i class=" icon-trash"></i></a><a href="#"><i class="icon-edit"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <td><td><td><td><td>
                                                    <td>
                                                        <h4><strong>Rp{{$total}}</strong></h4>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('member.checkout', $cart[0]->transaksi_id)}}"><button class="btn btn-success">Checkout</button></a>
                                                    </td>   
                                                </td></td></td></td></td></td>
                                            </tr>
                            @else
                                            <td><td><td><td><td><td><td>
                                                <h2>Anda belum memiliki transaksi</h2>
                                            </td></td></td></td></td></td></td>
                            @endif
                                </tbody>
                            </table>
                            @endforeach
                        </div>

                        <div id="belum-dibayar" class="tab-pane fade">
                            @foreach($cart_1 as $cart)
                            @if(is_object($cart[0]))
                            <?php $total = 0; ?>
                            <table class="table table-striped cart-list add_bottom_30">
                                <h4>{{$cart[0]->nama_printing}}</h4>
                                <thead>
                                    <tr>
                                        <th>Jenis Cetak</th>
                                        <th>Jumlah Halaman</th>
                                        <th>Jumlah Cetak</th>
                                        <th>File</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $trx0)
                                            <tr>
                                                <td>
                                                    {{$trx0->jenis_printing, $trx0->jenis_kertas, $trx0->ukuran_kertas}}
                                                </td>
                                                <td>
                                                    <p>{{$trx0->jumlah_halaman}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$trx0->jumlah_cetak}}</p>
                                                </td>
                                                <td>
                                                    <form action="{{route('member.download')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="path" value="{{$trx0->file}}">
                                                        <input type="submit" value="Download" class="btn btn-primary">
                                                    </form>
                                                </td>
                                                <td>
                                                    Rp{{$trx0->harga}}
                                                </td>
                                                <td>
                                                    <strong>Rp{{$trx0->total}}</strong>
                                                    <?php $total = $total + $trx0->total; ?>
                                                </td>
                                            </tr>
                                        @endforeach
                                            <tr><td></td></tr>
                                            <tr>
                                                <td><td><td>
                                                    <td>
                                                        <h4>Total Transaksi</h4>
                                                    </td>
                                                    <td>
                                                        <h4><strong>Rp{{$total}}</strong></h4>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('member.getbukti', $cart[0]->transaksi_id)}}"><button class="btn btn-success">Bayar Sekarang</button></a>
                                                    </td>   
                                                </td></td></td>
                                            </tr>
                                            <tr><td></td></tr>
                                            <tr>
                                                <td><td><td><td><td>
                                                    <td>
                                                        <a href="#"><button class="btn btn-danger">Batalkan Pesanan</button></a>
                                                    </td>   
                                                </td></td></td></td>
                                            </tr>
                            @else
                                            <td><td><td><td><td><td><td>
                                                <h2>Anda belum memiliki transaksi</h2>
                                            </td></td></td></td></td></td></td>
                            @endif
                                </tbody>
                            </table>
                            @endforeach
                        </div>

                        <div id="sudah-dibayar" class="tab-pane fade">
                            @foreach($cart_2 as $cart)
                            @if(is_object($cart[0]))
                            <?php $total = 0; ?>
                            <table class="table table-striped cart-list add_bottom_30">
                                <h4>{{$cart[0]->nama_printing}}</h4>
                                <thead>
                                    <tr>
                                        <th>Jenis Cetak</th>
                                        <th>Jumlah Halaman</th>
                                        <th>Jumlah Cetak</th>
                                        <th>File</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $trx0)
                                            <tr>
                                                <td>
                                                    {{$trx0->jenis_printing, $trx0->jenis_kertas, $trx0->ukuran_kertas}}
                                                </td>
                                                <td>
                                                    <p>{{$trx0->jumlah_halaman}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$trx0->jumlah_cetak}}</p>
                                                </td>
                                                <td>
                                                    <form action="{{route('member.download')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="path" value="{{$trx0->file}}">
                                                        <input type="submit" value="Download" class="btn btn-primary">
                                                    </form>
                                                </td>
                                                <td>
                                                    Rp{{$trx0->harga}}
                                                </td>
                                                <td>
                                                    <strong>Rp{{$trx0->total}}</strong>
                                                    <?php $total = $total + $trx0->total; ?>
                                                </td>
                                        @endforeach
                                            <tr>
                                                <td><td><td><td><td>
                                                    <td>
                                                        <h4><strong>Rp{{$total}}</strong></h4>
                                                    </td>
                                                </td></td></td></td></td></td>
                                            </tr>
                            @else
                                            <td><td><td><td><td><td><td>
                                                <h2>Anda belum memiliki transaksi</h2>
                                            </td></td></td></td></td></td></td>
                            @endif
                                </tbody>
                            </table>
                            @endforeach
                        </div>

                        <div id="selesai" class="tab-pane fade">
                            @foreach($cart_3 as $cart)
                            @if(is_object($cart[0]))
                            <?php $total = 0; ?>
                            <table class="table table-striped cart-list add_bottom_30">
                                <h4>{{$cart[0]->nama_printing}}</h4>
                                <thead>
                                    <tr>
                                        <th>Jenis Cetak</th>
                                        <th>Jumlah Halaman</th>
                                        <th>Jumlah Cetak</th>
                                        <th>File</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $trx0)
                                            <tr>
                                                <td>
                                                    {{$trx0->jenis_printing, $trx0->jenis_kertas, $trx0->ukuran_kertas}}
                                                </td>
                                                <td>
                                                    <p>{{$trx0->jumlah_halaman}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$trx0->jumlah_cetak}}</p>
                                                </td>
                                                <td>
                                                    <form action="{{route('member.download')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="path" value="{{$trx0->file}}">
                                                        <input type="submit" value="Download" class="btn btn-primary">
                                                    </form>
                                                </td>
                                                <td>
                                                    Rp{{$trx0->harga}}
                                                </td>
                                                <td>
                                                    <strong>Rp{{$trx0->total}}</strong>
                                                    <?php $total = $total + $trx0->total; ?>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if($trx0->status_pemesanan == 3)
                                            <tr><td></td></tr>
                                            <tr>
                                                <td><td><td>
                                                    <td>
                                                        <h4>Total Transaksi</h4>
                                                    </td>
                                                    <td>
                                                        <h4><strong>Rp{{$total}}</strong></h4>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('member.getrating', $cart[0]->transaksi_id)}}"><button class="btn btn-success">Nilai Sekarang</button></a>
                                                    </td>   
                                                </td></td></td>
                                            </tr>
                                        @endif
                            @else
                                            <td><td><td><td><td><td><td>
                                                <h2>Anda belum memiliki transaksi</h2>
                                            </td></td></td></td></td></td></td>
                            @endif
                                </tbody>
                            </table>
                            @endforeach
                        </div>

                        <div id="dibatalkan" class="tab-pane fade">
                            @foreach($cart_4 as $cart)
                            @if(is_object($cart[0]))
                            <?php $total = 0; ?>
                            <table class="table table-striped cart-list add_bottom_30">
                                <h4>{{$cart[0]->nama_printing}}</h4>
                                <thead>
                                    <tr>
                                        <th>Jenis Cetak</th>
                                        <th>Jumlah Halaman</th>
                                        <th>Jumlah Cetak</th>
                                        <th>File</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $trx0)
                                            <tr>
                                                <td>
                                                    {{$trx0->jenis_printing, $trx0->jenis_kertas, $trx0->ukuran_kertas}}
                                                </td>
                                                <td>
                                                    <p>{{$trx0->jumlah_halaman}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$trx0->jumlah_cetak}}</p>
                                                </td>
                                                <td>
                                                    <form action="{{route('member.download')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="path" value="{{$trx0->file}}">
                                                        <input type="submit" value="Download" class="btn btn-primary">
                                                    </form>
                                                </td>
                                                <td>
                                                    Rp{{$trx0->harga}}
                                                </td>
                                                <td>
                                                    <strong>Rp{{$trx0->total}}</strong>
                                                    <?php $total = $total + $trx0->total; ?>
                                                </td>
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <td><td><td><td><td>
                                                    <td>
                                                        <h4><strong>Rp{{$total}}</strong></h4>
                                                    </td>
                                                </td></td></td></td></td></td>
                                            </tr>
                            @else
                                            <td><td><td><td><td><td><td>
                                                <h2>Anda belum memiliki transaksi</h2>
                                            </td></td></td></td></td></td></td>
                            @endif
                                </tbody>
                            </table>
                            @endforeach
                        </div>

                    </div>
				</div>
				<!-- End col-md-8 -->

                <!--
				<aside class="col-md-4">
					<div class="box_style_1">
						<h3 class="inner">- Summary -</h3>
						<table class="table table_summary">
							<tbody>
								<tr>
									<td>
										Adults
									</td>
									<td class="text-right">
										2
									</td>
								</tr>
								<tr>
									<td>
										Children
									</td>
									<td class="text-right">
										0
									</td>
								</tr>
								<tr>
									<td>
										Dedicated tour guide
									</td>
									<td class="text-right">
										$34
									</td>
								</tr>
								<tr>
									<td>
										Insurance
									</td>
									<td class="text-right">
										$34
									</td>
								</tr>
								<tr class="total">
									<td>
										Total cost
									</td>
									<td class="text-right">
										$154
									</td>
								</tr>
							</tbody>
						</table>
						<a class="btn_full" href="payment.html">Check out</a>
						<a class="btn_full_outline" href="#"><i class="icon-right"></i> Continue shopping</a>
					</div>
				</aside>
                -->
				<!-- End aside -->
			</div>
			<!--End row -->
		</div>
		<!--End container -->
	</main>
	<!-- End main -->

	<footer class="revealed">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <h3>Need help?</h3>
                    <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                    <a href="http://www.ansonika.com/cdn-cgi/l/email-protection#e28a878e92a2818b969b968d979091cc818d8f" id="email_footer"><span class="__cf_email__" data-cfemail="761e131a0636151f020f02190304055815191b">[email&#160;protected]</span></a>
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