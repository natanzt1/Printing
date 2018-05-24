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
							@if(isset($printing->foto))
							<a href="{{route('everyone.detail', ['kota' => $kota, 'nama' => $printing->nama])}}">
								<img src="{{ URL::asset($printing->foto) }}" class="img-responsive" style="min-height: 300px; max-height: 350px">
							</a>
							@else
							<a href="{{route('everyone.detail', ['kota' => $kota, 'nama' => $printing->nama])}}">
								<img src="{{ URL::asset('img/tour_box_1.jpg') }}" style="min-height: 300px;max-height: 350px" class="img-responsive" alt="image">
							</a>
							@endif
						</div>
						<div class="tour_title">
							<h3><strong><a href="{{route('everyone.detail', ['kota' => $kota, 'nama' => $printing->nama])}}">{{$printing->nama}}</a></strong></h3>
							<div class="rating">
                                @for($star=0 ; $star< 5; $star++ )
                                	@if($star<($printing->rating))
                                    	<i class="icon-star voted"></i>
                                    @else
                                    	<i class=" icon-star-empty"></i>
                                    @endif
                                @endfor
                                ({{$printing->rating}} of 5)
							</div>
							<!-- end rating -->
							@auth('web')
							<div class="wishlist">
								<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to Favorite</span></span></a>
							</div>
							@endauth
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