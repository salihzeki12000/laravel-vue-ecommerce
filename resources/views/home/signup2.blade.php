@extends('template2')

@section('main')
<div class="flash-container">
	@if(Session::has('message'))
	<div class="alert {{ Session::get('alert-class') }} text-center" role="alert">
		<a href="#" class="alert-close" data-dismiss="alert">&times;</a> {{ Session::get('message') }}
	</div>
	@endif
</div>
<main id="site-content" role="main" class="log-user" ng-controller="home_page"  ng-init="code_session='{{session('verification_code')}}'">
	<div class="container">
		<div class="logo text-center mt-5">
			<a href="{{url('/')}}">
				<img src="{{url('/')}}/images/quickshopper-logo.svg" width="300" height="">
			</a>
		</div>
		<div class="login-form py-5 mb-5 col-md-8 col-lg-5 col-xl-4 mx-auto">
			<h1>{{trans('messages.profile.create_an_account')}}</h1>
			<form name="signup2" method="POST" action="{{route('store_signup_data')}}" name="signup_confirm">
				@csrf
				<div class="form-group">
					<label>{{trans('messages.driver.enter_the_digit_code_sent_to_you_at')}} {{$phone_number}}</label>
					<input type="text" value="{{session('verification_code')}}" name="code_confirm" id="code_confirm" placeholder=""/>
					<p id='code_check' style="display: none;color: red">{{trans('messages.store_dashboard.code_is_incorrect')}}</p>
				</div>
				<button class="btn btn-theme w-100 mt-3 d-flex justify-content-between align-items-center" id="code_confirm_submit" type="submit">{{trans('messages.profile.next_button')}} <i class="icon icon-right-arrow"></i></button>
			</form>
		</div>
	</div>
</main>
@stop
