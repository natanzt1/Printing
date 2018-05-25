@extends('header')

@section('content')
	<main>
    <section id="hero" class="login">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                	<div id="login" align="center">
                    		<h2><span>Admin Login</span></h2>
                            <hr>
                            <form method="POST" action="{{ route('admin.login.submit') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input id="email" type="input" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class=" form-control" name="password" placeholder="Password">
                                    </div>
                                    <p class="small">
                                        <a href="#">Forgot Password?</a>
                                    </p>
                                    <input type="submit" class="btn_full" name="submit" value="Sign In">
                                    
                                    <a href="/register" class="btn_full_outline">Register</a>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>
	</main><!-- End main -->
    
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