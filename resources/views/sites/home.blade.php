@extends('layouts.frontend')

@section('content')

			<!-- start banner Area -->
			<section class="banner-area relative" id="home" style="background: url('{{config('sekolah.image_banner_url')}}');">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase">
								{{config('sekolah.welcome_message')}}		
							</h1>
							<p class="pt-10 pb-10">
								{{config('sekolah.sub_welcome_message')}}
							</p>
							<a href="{{config('sekolah.welcome_message_button_url')}}" class="primary-btn text-uppercase">{{config('sekolah.welcome_message_button_text')}}</a>
						</div>										
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start feature Area -->
			<section class="feature-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>{{config('sekolah.home_feature_column_1_title')}}</h4>
								</div>
								<div class="desc-wrap">
									 <p>
										{{config('sekolah.home_feature_column_1_content')}}
									</p>
									<a href="{{config('sekolah.home_feature_column_1_link_url')}}">						{{config('sekolah.home_feature_column_1_link_text')}}</a>	
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>{{config('sekolah.home_feature_column_2_title')}}</h4>
								</div>
								<div class="desc-wrap">
									<p>
										{{config('sekolah.home_feature_column_2_content')}}
									</p>
									<a href="{{config('sekolah.home_feature_column_2_link_url')}}">						{{config('sekolah.home_feature_column_2_link_text')}}</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>{{config('sekolah.home_feature_column_3_title')}}</h4>
								</div>
								<div class="desc-wrap">
									<p>
										{{config('sekolah.home_feature_column_3_content')}}.
									</p>
									<a href="{{config('sekolah.home_feature_column_3_link_url')}}">					{{config('sekolah.home_feature_column_3_link_text')}}</a>			
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End feature Area -->
					
			<!-- Start popular-course Area -->
			
			<!-- End cta-two Area -->
				
@stop