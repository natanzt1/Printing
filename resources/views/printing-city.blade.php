@extends('header')


@section('content')
	<br><br>
    <main>

		<div class="container margin_60">

			<div class="main_title">
				<h2>Printing <span>{{$kota}}</span> </h2>
				<p>Daftar Printing yang ada di kota {{$kota}}.</p>
			</div>

			<div class="row">
                @foreach($printings as $printing)
				<div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
					<div class="tour_container">
						<div class="img_container">
							<a href="/printing/{{$kota}}/{{$printing->nama}}">
								<img src="{{ URL::asset('img/tour_box_1.jpg') }}" width="800" height="533" class="img-responsive" alt="image">
							</a>
						</div>
						<div class="tour_title">
							<h3><strong><a href="/printing/{{$kota}}/{{$printing->nama}}">{{$printing->nama}}</a></strong></h3>
							<div class="rating">
                                @for ($i = 0; $i < $printing->rating; $i++)
								<i class="icon-smile voted"></i>
                                @endfor

                                @for ($i = $printing->rating; $i < 5; $i++)
                                <i class="icon-smile"></i>
                                @endfor
							</div>
							<!-- end rating -->
							<div class="wishlist">
								<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to Favorite</span></span></a>
							</div>
							<!-- End wish list-->
						</div>
					</div>
					<!-- End box tour -->
				</div>
                @endforeach
				<!-- End col-md-4 -->
            </div>
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->
	
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