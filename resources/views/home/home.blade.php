@extends('template2')

@section('main')
<main id="site-content" role="main" ng-controller="home_page">
	<div class="main-banner">
		<div class="main-banner-bg"></div>
		<div class="container text-center">
			<div class="home-banner-content text-center">
				<div class="logo">
					<a href="{{url('/')}}" class="d-inline-block">
						 <img src="{{url('/')}}/images/quickshopper-logo.svg">
					</a>
				</div>
				<h1>{{trans('messages.discover_stores')}}</h1>
				<form class="search_form_home w-100" name="search" ng-init="head_location='{{session('location')}}'">
					<div class="search-input">
						<p>Enter your postcode</p>
						<!-- <svg width="20px" height="22px" viewBox="0 0 16 16" version="1.1"><g id="Symbols" stroke="none" stroke-width="2" fill="none" fill-rule="evenodd"><g id="Icons-/-Semantic-/-Location" stroke="#f68202"><g id="Group" transform="translate(1.500000, 0.000000)"><path d="M6.5,15.285929 L10.7392259,10.9636033 C13.0869247,8.56988335 13.0869247,4.68495065 10.7392259,2.29123075 C8.39683517,-0.0970769149 4.60316483,-0.0970769149 2.26077415,2.29123075 C-0.0869247162,4.68495065 -0.0869247162,8.56988335 2.26077415,10.9636033 L6.5,15.285929 Z" id="Combined-Shape"></path><circle id="Oval-3" cx="6.5" cy="6.5" r="2"></circle></g></g></g></svg> -->
						<input type="text" class="w-100 text-truncate" placeholder="{{trans('messages.enter_delivery_address')}}" value="{{session('location')}}" name="head_location" ng-model="head_location" id="head_location_val" autocomplete="off" />
						<input type="hidden" name="postal_code" ng-model="postal_code" id="postal_code"/>
						<input type="hidden" name="city" ng-model="city" id="city"/>
						<input type="hidden" name="latitude" ng-model="latitude" id="latitude"/>
						<input type="hidden" name="longitude" ng-model="longitude" id="longitude"/>
						<p class="error-msg text-left">
							<img class="chevron-down" src="{{url('/')}}/images/icon-error--red.svg">
							Please enter a postcode
						</p>						
					</div>
					<button class="btn btn-theme w-100" type="submit" id="find_food">{{trans('messages.find_item')}}</button>
				</form>
			</div>
		</div>
	</div>

	<div class="slider-wrap">
		<h2 align="center" style="padding-bottom: 20px;">How it works?</h2>
		<div class="container d-md-flex justify-content-between">
			@foreach($slider as $key=>$home_slider)
			<div class="slider-row text-center">
				<div class="slider-img">
					<img ci-src="{{$home_slider->slider_image}}"/>
				</div>
				<div class="slider-info">
					<h1>
						{{$home_slider->title}}
					</h1>
					<p>
						{{$home_slider->description}}
					</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>

	<div class="bottom-content">
		<div class="container">
			<div class="get-start-wrap d-md-flex">
				<div class="get-start-img col-12 col-md-5 p-0">
					<img class="img-fluid" src="{{url('/')}}/images/content-banner1.jpg">
				</div>
				<div class="get-start-info col-12 col-md-7">
					<h2>{{trans('messages.store_deliver',['site_name'=>site_setting('site_name')])}}</h2>
					<p>{{trans('messages.store_deliver_desc',['site_name'=>site_setting('site_name')])}}</p>
					<a href="{{route('store.signup')}}" class="btn btn-theme">
						{{trans('messages.get_started')}}
					</a>
				</div>
			</div>
			<div class="get-start-wrap d-md-flex">
				<div class="get-start-img col-12 col-md-5 p-0">
					<img class="img-fluid" src="{{url('/')}}/images/content-banner2.jpg">
				</div>
				<div class="get-start-info col-12 col-md-7">
					<h2>{{trans('messages.deliver_eats')}}</h2>
					<p>{{trans('messages.deliver_eats_desc',['site_name'=>site_setting('site_name')])}}</p>
					<a href="{{route('driver.signup')}}" class="btn btn-theme">
						{{trans('messages.get_started')}}
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="download-block">
		<div class="container">
			<div class="download-link text-center">
				<h2>
					{{trans('messages.get_app')}}
				</h2>
				<ul>
					<li>
						<a href="{{site_setting('eater_android_link')}}">
							<svg viewBox="0 0 145 38" xmlns="http://www.w3.org/2000/svg"><g fill="#FFF" fill-rule="evenodd"><path d="M49.246 5.044h-3.108v.98h1.918v2.814c-.28.14-.826.252-1.624.252-2.198 0-3.64-1.414-3.64-3.808 0-2.366 1.498-3.794 3.794-3.794.952 0 1.582.182 2.086.406L48.966.9c-.406-.196-1.26-.434-2.352-.434-3.164 0-5.096 2.058-5.11 4.872 0 1.47.504 2.73 1.316 3.514.924.882 2.1 1.246 3.528 1.246a8.79 8.79 0 0 0 2.898-.518V5.044zm7.336 1.792c.014-.126.042-.322.042-.574 0-1.246-.588-3.192-2.8-3.192-1.974 0-3.178 1.61-3.178 3.654 0 2.044 1.246 3.416 3.332 3.416 1.078 0 1.82-.224 2.254-.42l-.21-.882c-.462.196-.994.35-1.876.35-1.232 0-2.296-.686-2.324-2.352h4.76zm-4.746-.882c.098-.854.644-2.002 1.89-2.002 1.386 0 1.722 1.218 1.708 2.002h-3.598zM58.43 1.6v1.624h-1.05v.938h1.05v3.696c0 .798.126 1.4.476 1.764.294.336.756.518 1.33.518.476 0 .854-.07 1.092-.168l-.056-.924a2.74 2.74 0 0 1-.714.084c-.686 0-.924-.476-.924-1.316V4.162h1.764v-.938h-1.764V1.278L58.43 1.6zm8.554 8.4V3.224h-1.232V10h1.232zM66.368.55a.75.75 0 0 0-.77.77c0 .42.308.756.742.756.49 0 .798-.336.784-.756 0-.434-.294-.77-.756-.77zm2.66 9.45h1.232V5.926c0-.21.028-.42.084-.574.21-.686.84-1.26 1.652-1.26 1.162 0 1.568.91 1.568 2.002V10h1.232V5.954c0-2.324-1.456-2.884-2.394-2.884-1.12 0-1.904.63-2.24 1.274h-.028l-.07-1.12h-1.092c.042.56.056 1.134.056 1.834V10zm13.608-6.93c-1.876 0-3.36 1.33-3.36 3.598 0 2.142 1.414 3.486 3.248 3.486 1.638 0 3.374-1.092 3.374-3.598 0-2.072-1.316-3.486-3.262-3.486zm-.028.924c1.456 0 2.03 1.456 2.03 2.604 0 1.526-.882 2.632-2.058 2.632-1.204 0-2.058-1.12-2.058-2.604 0-1.288.63-2.632 2.086-2.632zM87.452 10h1.232V5.926c0-.21.028-.42.084-.574.21-.686.84-1.26 1.652-1.26 1.162 0 1.568.91 1.568 2.002V10h1.232V5.954c0-2.324-1.456-2.884-2.394-2.884-1.12 0-1.904.63-2.24 1.274h-.028l-.07-1.12h-1.092c.042.56.056 1.134.056 1.834V10zM118.383 23.567c0-1.195-.976-2.166-2.428-2.166h-2.61v4.332h2.733c1.284 0 2.305-.97 2.305-2.166zm-19.74 4.198l4.766-1.944c-.495-.82-1.292-1.073-1.974-1.073-1.813 0-3.057 1.983-2.792 3.017zm-9.42 1.128a2.775 2.775 0 0 0 .091-.42 3.14 3.14 0 0 0-.001-1.068 2.67 2.67 0 0 0-.131-.527c-.405-1.21-1.485-2.072-2.746-2.061-1.602.012-2.892 1.424-2.88 3.152.012 1.726 1.32 3.118 2.922 3.106 1.262-.01 2.33-.888 2.745-2.182zm-11.362-.945c0-1.492-1.092-3.136-2.989-3.136-1.897 0-2.989 1.645-2.989 3.137 0 1.493 1.092 3.137 2.99 3.137 1.896 0 2.988-1.646 2.988-3.138zm-11.625 0c0-1.492-1.092-3.136-2.989-3.136-1.897 0-2.989 1.645-2.989 3.137 0 1.493 1.092 3.137 2.99 3.137 1.896 0 2.988-1.646 2.988-3.138zm65.988 1.1c-.532-.348-1.342-.502-2.046-.502-1.545 0-2.417.75-2.417 1.572 0 .916.911 1.37 1.764 1.37 1.24 0 2.7-.993 2.7-2.44zM92.946 32.84h2.377V17.52h-2.377v15.32zm29.074.222h2.17v-13.69h-2.17v13.69zm-10.846 0V19.374h4.58c2.761 0 4.845 1.857 4.845 4.145 0 2.288-1.98 4.146-4.421 4.146h-2.833v5.397h-2.171zM97.759 31.61c-1.908-2.025-1.908-5.344 0-7.369 1.908-2.025 5.166-2.014 7.016-.012.608.657 1.016 1.507 1.376 2.39l-7.141 2.89c.417.81 1.238 1.585 2.539 1.585 1.113 0 1.87-.359 2.668-1.447l1.867 1.208h.001c-.214.273-.48.544-.68.755-1.907 2.025-5.738 2.025-7.646 0zm-54.376-.927c-3.24-3.14-3.145-8.187.096-11.328A8.443 8.443 0 0 1 49.394 17a8.55 8.55 0 0 1 5.691 2.186l-1.605 1.611c-2.325-2.171-6.019-2.143-8.294.109-2.3 2.292-2.353 5.974-.055 8.267 2.318 2.292 6.159 2.427 8.475.135.783-.775 1.05-1.765 1.208-2.776h-5.433v-2.209h7.633c.109.552.126 1.121.126 1.683 0 1.817-.817 3.743-2.08 4.987-1.445 1.422-3.46 2.158-5.59 2.14-2.208-.018-4.425-.851-6.087-2.45zm26.134-2.733c0-2.475 1.957-5.202 5.355-5.202 3.399 0 5.356 2.726 5.356 5.2s-1.957 5.201-5.356 5.201c-3.398 0-5.355-2.725-5.355-5.199zm-11.626 0c0-2.475 1.958-5.202 5.356-5.202 3.399 0 5.356 2.726 5.356 5.2s-1.957 5.201-5.356 5.201c-3.398 0-5.356-2.725-5.356-5.199zm68.595 4.463c-.617-.572-.955-1.47-.964-2.295a2.83 2.83 0 0 1 .797-2.018c.88-.906 2.207-1.294 3.598-1.294.909 0 1.713.176 2.322.512 0-1.512-1.23-2.089-2.27-2.089-.962 0-1.81.488-2.135 1.333l-1.965-.766c.35-.913 1.45-2.473 4.052-2.473 1.268 0 2.526.43 3.346 1.268.82.838 1.093 1.883 1.093 3.27v5.192h-2.145v-.928a3.63 3.63 0 0 1-1.174.895c-.55.26-1.2.35-1.796.35-.978 0-2.054-.305-2.759-.957zm10.392 4.722l2.17-4.944-3.843-8.573h2.188l2.739 6.106 2.68-6.106H145l-5.933 13.517h-2.19zm-53.887-.518c-.608-.517-1.126-1.318-1.429-1.878l2.075-.85c.134.244.326.62.635.941.532.555 1.245.936 2.108.936.806 0 1.717-.355 2.195-.994.428-.572.595-1.3.595-2.08v-.78c-1.482 1.833-4.721 1.577-6.533-.318-1.937-2.025-1.92-5.312.04-7.337 1.933-1.842 4.801-2.074 6.489-.33l.004.004v-.882h2.248v9.397c0 2.39-.913 3.742-2.047 4.529-.83.576-1.992.84-3.017.84-1.332 0-2.474-.442-3.363-1.198zM.914 35.14C.36 34.99 0 34.44 0 33.59V5.512C0 4.724.305 4.193.789 4l13.798 15.647L.914 35.14zm1.9-.597l16.608-9.413-4.045-4.587-12.564 14zM19.535 14.04L3.16 4.755l12.242 13.97 4.135-4.686zm1.111.63l6.416 3.637c1.215.689 1.226 1.799 0 2.494l-6.578 3.728-4.29-4.897 4.452-4.962z"></path></g></svg>
						</a>
						<span>
							{{trans('messages.svg.for_user_android')}}
						</span>
					</li>
					<!-- <li>
						<a href="{{site_setting('store_android_link')}}">
							<svg viewBox="0 0 145 38" xmlns="http://www.w3.org/2000/svg"><g fill="#FFF" fill-rule="evenodd"><path d="M49.246 5.044h-3.108v.98h1.918v2.814c-.28.14-.826.252-1.624.252-2.198 0-3.64-1.414-3.64-3.808 0-2.366 1.498-3.794 3.794-3.794.952 0 1.582.182 2.086.406L48.966.9c-.406-.196-1.26-.434-2.352-.434-3.164 0-5.096 2.058-5.11 4.872 0 1.47.504 2.73 1.316 3.514.924.882 2.1 1.246 3.528 1.246a8.79 8.79 0 0 0 2.898-.518V5.044zm7.336 1.792c.014-.126.042-.322.042-.574 0-1.246-.588-3.192-2.8-3.192-1.974 0-3.178 1.61-3.178 3.654 0 2.044 1.246 3.416 3.332 3.416 1.078 0 1.82-.224 2.254-.42l-.21-.882c-.462.196-.994.35-1.876.35-1.232 0-2.296-.686-2.324-2.352h4.76zm-4.746-.882c.098-.854.644-2.002 1.89-2.002 1.386 0 1.722 1.218 1.708 2.002h-3.598zM58.43 1.6v1.624h-1.05v.938h1.05v3.696c0 .798.126 1.4.476 1.764.294.336.756.518 1.33.518.476 0 .854-.07 1.092-.168l-.056-.924a2.74 2.74 0 0 1-.714.084c-.686 0-.924-.476-.924-1.316V4.162h1.764v-.938h-1.764V1.278L58.43 1.6zm8.554 8.4V3.224h-1.232V10h1.232zM66.368.55a.75.75 0 0 0-.77.77c0 .42.308.756.742.756.49 0 .798-.336.784-.756 0-.434-.294-.77-.756-.77zm2.66 9.45h1.232V5.926c0-.21.028-.42.084-.574.21-.686.84-1.26 1.652-1.26 1.162 0 1.568.91 1.568 2.002V10h1.232V5.954c0-2.324-1.456-2.884-2.394-2.884-1.12 0-1.904.63-2.24 1.274h-.028l-.07-1.12h-1.092c.042.56.056 1.134.056 1.834V10zm13.608-6.93c-1.876 0-3.36 1.33-3.36 3.598 0 2.142 1.414 3.486 3.248 3.486 1.638 0 3.374-1.092 3.374-3.598 0-2.072-1.316-3.486-3.262-3.486zm-.028.924c1.456 0 2.03 1.456 2.03 2.604 0 1.526-.882 2.632-2.058 2.632-1.204 0-2.058-1.12-2.058-2.604 0-1.288.63-2.632 2.086-2.632zM87.452 10h1.232V5.926c0-.21.028-.42.084-.574.21-.686.84-1.26 1.652-1.26 1.162 0 1.568.91 1.568 2.002V10h1.232V5.954c0-2.324-1.456-2.884-2.394-2.884-1.12 0-1.904.63-2.24 1.274h-.028l-.07-1.12h-1.092c.042.56.056 1.134.056 1.834V10zM118.383 23.567c0-1.195-.976-2.166-2.428-2.166h-2.61v4.332h2.733c1.284 0 2.305-.97 2.305-2.166zm-19.74 4.198l4.766-1.944c-.495-.82-1.292-1.073-1.974-1.073-1.813 0-3.057 1.983-2.792 3.017zm-9.42 1.128a2.775 2.775 0 0 0 .091-.42 3.14 3.14 0 0 0-.001-1.068 2.67 2.67 0 0 0-.131-.527c-.405-1.21-1.485-2.072-2.746-2.061-1.602.012-2.892 1.424-2.88 3.152.012 1.726 1.32 3.118 2.922 3.106 1.262-.01 2.33-.888 2.745-2.182zm-11.362-.945c0-1.492-1.092-3.136-2.989-3.136-1.897 0-2.989 1.645-2.989 3.137 0 1.493 1.092 3.137 2.99 3.137 1.896 0 2.988-1.646 2.988-3.138zm-11.625 0c0-1.492-1.092-3.136-2.989-3.136-1.897 0-2.989 1.645-2.989 3.137 0 1.493 1.092 3.137 2.99 3.137 1.896 0 2.988-1.646 2.988-3.138zm65.988 1.1c-.532-.348-1.342-.502-2.046-.502-1.545 0-2.417.75-2.417 1.572 0 .916.911 1.37 1.764 1.37 1.24 0 2.7-.993 2.7-2.44zM92.946 32.84h2.377V17.52h-2.377v15.32zm29.074.222h2.17v-13.69h-2.17v13.69zm-10.846 0V19.374h4.58c2.761 0 4.845 1.857 4.845 4.145 0 2.288-1.98 4.146-4.421 4.146h-2.833v5.397h-2.171zM97.759 31.61c-1.908-2.025-1.908-5.344 0-7.369 1.908-2.025 5.166-2.014 7.016-.012.608.657 1.016 1.507 1.376 2.39l-7.141 2.89c.417.81 1.238 1.585 2.539 1.585 1.113 0 1.87-.359 2.668-1.447l1.867 1.208h.001c-.214.273-.48.544-.68.755-1.907 2.025-5.738 2.025-7.646 0zm-54.376-.927c-3.24-3.14-3.145-8.187.096-11.328A8.443 8.443 0 0 1 49.394 17a8.55 8.55 0 0 1 5.691 2.186l-1.605 1.611c-2.325-2.171-6.019-2.143-8.294.109-2.3 2.292-2.353 5.974-.055 8.267 2.318 2.292 6.159 2.427 8.475.135.783-.775 1.05-1.765 1.208-2.776h-5.433v-2.209h7.633c.109.552.126 1.121.126 1.683 0 1.817-.817 3.743-2.08 4.987-1.445 1.422-3.46 2.158-5.59 2.14-2.208-.018-4.425-.851-6.087-2.45zm26.134-2.733c0-2.475 1.957-5.202 5.355-5.202 3.399 0 5.356 2.726 5.356 5.2s-1.957 5.201-5.356 5.201c-3.398 0-5.355-2.725-5.355-5.199zm-11.626 0c0-2.475 1.958-5.202 5.356-5.202 3.399 0 5.356 2.726 5.356 5.2s-1.957 5.201-5.356 5.201c-3.398 0-5.356-2.725-5.356-5.199zm68.595 4.463c-.617-.572-.955-1.47-.964-2.295a2.83 2.83 0 0 1 .797-2.018c.88-.906 2.207-1.294 3.598-1.294.909 0 1.713.176 2.322.512 0-1.512-1.23-2.089-2.27-2.089-.962 0-1.81.488-2.135 1.333l-1.965-.766c.35-.913 1.45-2.473 4.052-2.473 1.268 0 2.526.43 3.346 1.268.82.838 1.093 1.883 1.093 3.27v5.192h-2.145v-.928a3.63 3.63 0 0 1-1.174.895c-.55.26-1.2.35-1.796.35-.978 0-2.054-.305-2.759-.957zm10.392 4.722l2.17-4.944-3.843-8.573h2.188l2.739 6.106 2.68-6.106H145l-5.933 13.517h-2.19zm-53.887-.518c-.608-.517-1.126-1.318-1.429-1.878l2.075-.85c.134.244.326.62.635.941.532.555 1.245.936 2.108.936.806 0 1.717-.355 2.195-.994.428-.572.595-1.3.595-2.08v-.78c-1.482 1.833-4.721 1.577-6.533-.318-1.937-2.025-1.92-5.312.04-7.337 1.933-1.842 4.801-2.074 6.489-.33l.004.004v-.882h2.248v9.397c0 2.39-.913 3.742-2.047 4.529-.83.576-1.992.84-3.017.84-1.332 0-2.474-.442-3.363-1.198zM.914 35.14C.36 34.99 0 34.44 0 33.59V5.512C0 4.724.305 4.193.789 4l13.798 15.647L.914 35.14zm1.9-.597l16.608-9.413-4.045-4.587-12.564 14zM19.535 14.04L3.16 4.755l12.242 13.97 4.135-4.686zm1.111.63l6.416 3.637c1.215.689 1.226 1.799 0 2.494l-6.578 3.728-4.29-4.897 4.452-4.962z"></path></g></svg>
						</a>
						<span>
							{{trans('messages.svg.for_store')}}
						</span>
					</li> -->
					<!-- <li>
						<a href="{{site_setting('driver_android_link')}}">
							<svg viewBox="0 0 145 38" xmlns="http://www.w3.org/2000/svg"><g fill="#FFF" fill-rule="evenodd"><path d="M49.246 5.044h-3.108v.98h1.918v2.814c-.28.14-.826.252-1.624.252-2.198 0-3.64-1.414-3.64-3.808 0-2.366 1.498-3.794 3.794-3.794.952 0 1.582.182 2.086.406L48.966.9c-.406-.196-1.26-.434-2.352-.434-3.164 0-5.096 2.058-5.11 4.872 0 1.47.504 2.73 1.316 3.514.924.882 2.1 1.246 3.528 1.246a8.79 8.79 0 0 0 2.898-.518V5.044zm7.336 1.792c.014-.126.042-.322.042-.574 0-1.246-.588-3.192-2.8-3.192-1.974 0-3.178 1.61-3.178 3.654 0 2.044 1.246 3.416 3.332 3.416 1.078 0 1.82-.224 2.254-.42l-.21-.882c-.462.196-.994.35-1.876.35-1.232 0-2.296-.686-2.324-2.352h4.76zm-4.746-.882c.098-.854.644-2.002 1.89-2.002 1.386 0 1.722 1.218 1.708 2.002h-3.598zM58.43 1.6v1.624h-1.05v.938h1.05v3.696c0 .798.126 1.4.476 1.764.294.336.756.518 1.33.518.476 0 .854-.07 1.092-.168l-.056-.924a2.74 2.74 0 0 1-.714.084c-.686 0-.924-.476-.924-1.316V4.162h1.764v-.938h-1.764V1.278L58.43 1.6zm8.554 8.4V3.224h-1.232V10h1.232zM66.368.55a.75.75 0 0 0-.77.77c0 .42.308.756.742.756.49 0 .798-.336.784-.756 0-.434-.294-.77-.756-.77zm2.66 9.45h1.232V5.926c0-.21.028-.42.084-.574.21-.686.84-1.26 1.652-1.26 1.162 0 1.568.91 1.568 2.002V10h1.232V5.954c0-2.324-1.456-2.884-2.394-2.884-1.12 0-1.904.63-2.24 1.274h-.028l-.07-1.12h-1.092c.042.56.056 1.134.056 1.834V10zm13.608-6.93c-1.876 0-3.36 1.33-3.36 3.598 0 2.142 1.414 3.486 3.248 3.486 1.638 0 3.374-1.092 3.374-3.598 0-2.072-1.316-3.486-3.262-3.486zm-.028.924c1.456 0 2.03 1.456 2.03 2.604 0 1.526-.882 2.632-2.058 2.632-1.204 0-2.058-1.12-2.058-2.604 0-1.288.63-2.632 2.086-2.632zM87.452 10h1.232V5.926c0-.21.028-.42.084-.574.21-.686.84-1.26 1.652-1.26 1.162 0 1.568.91 1.568 2.002V10h1.232V5.954c0-2.324-1.456-2.884-2.394-2.884-1.12 0-1.904.63-2.24 1.274h-.028l-.07-1.12h-1.092c.042.56.056 1.134.056 1.834V10zM118.383 23.567c0-1.195-.976-2.166-2.428-2.166h-2.61v4.332h2.733c1.284 0 2.305-.97 2.305-2.166zm-19.74 4.198l4.766-1.944c-.495-.82-1.292-1.073-1.974-1.073-1.813 0-3.057 1.983-2.792 3.017zm-9.42 1.128a2.775 2.775 0 0 0 .091-.42 3.14 3.14 0 0 0-.001-1.068 2.67 2.67 0 0 0-.131-.527c-.405-1.21-1.485-2.072-2.746-2.061-1.602.012-2.892 1.424-2.88 3.152.012 1.726 1.32 3.118 2.922 3.106 1.262-.01 2.33-.888 2.745-2.182zm-11.362-.945c0-1.492-1.092-3.136-2.989-3.136-1.897 0-2.989 1.645-2.989 3.137 0 1.493 1.092 3.137 2.99 3.137 1.896 0 2.988-1.646 2.988-3.138zm-11.625 0c0-1.492-1.092-3.136-2.989-3.136-1.897 0-2.989 1.645-2.989 3.137 0 1.493 1.092 3.137 2.99 3.137 1.896 0 2.988-1.646 2.988-3.138zm65.988 1.1c-.532-.348-1.342-.502-2.046-.502-1.545 0-2.417.75-2.417 1.572 0 .916.911 1.37 1.764 1.37 1.24 0 2.7-.993 2.7-2.44zM92.946 32.84h2.377V17.52h-2.377v15.32zm29.074.222h2.17v-13.69h-2.17v13.69zm-10.846 0V19.374h4.58c2.761 0 4.845 1.857 4.845 4.145 0 2.288-1.98 4.146-4.421 4.146h-2.833v5.397h-2.171zM97.759 31.61c-1.908-2.025-1.908-5.344 0-7.369 1.908-2.025 5.166-2.014 7.016-.012.608.657 1.016 1.507 1.376 2.39l-7.141 2.89c.417.81 1.238 1.585 2.539 1.585 1.113 0 1.87-.359 2.668-1.447l1.867 1.208h.001c-.214.273-.48.544-.68.755-1.907 2.025-5.738 2.025-7.646 0zm-54.376-.927c-3.24-3.14-3.145-8.187.096-11.328A8.443 8.443 0 0 1 49.394 17a8.55 8.55 0 0 1 5.691 2.186l-1.605 1.611c-2.325-2.171-6.019-2.143-8.294.109-2.3 2.292-2.353 5.974-.055 8.267 2.318 2.292 6.159 2.427 8.475.135.783-.775 1.05-1.765 1.208-2.776h-5.433v-2.209h7.633c.109.552.126 1.121.126 1.683 0 1.817-.817 3.743-2.08 4.987-1.445 1.422-3.46 2.158-5.59 2.14-2.208-.018-4.425-.851-6.087-2.45zm26.134-2.733c0-2.475 1.957-5.202 5.355-5.202 3.399 0 5.356 2.726 5.356 5.2s-1.957 5.201-5.356 5.201c-3.398 0-5.355-2.725-5.355-5.199zm-11.626 0c0-2.475 1.958-5.202 5.356-5.202 3.399 0 5.356 2.726 5.356 5.2s-1.957 5.201-5.356 5.201c-3.398 0-5.356-2.725-5.356-5.199zm68.595 4.463c-.617-.572-.955-1.47-.964-2.295a2.83 2.83 0 0 1 .797-2.018c.88-.906 2.207-1.294 3.598-1.294.909 0 1.713.176 2.322.512 0-1.512-1.23-2.089-2.27-2.089-.962 0-1.81.488-2.135 1.333l-1.965-.766c.35-.913 1.45-2.473 4.052-2.473 1.268 0 2.526.43 3.346 1.268.82.838 1.093 1.883 1.093 3.27v5.192h-2.145v-.928a3.63 3.63 0 0 1-1.174.895c-.55.26-1.2.35-1.796.35-.978 0-2.054-.305-2.759-.957zm10.392 4.722l2.17-4.944-3.843-8.573h2.188l2.739 6.106 2.68-6.106H145l-5.933 13.517h-2.19zm-53.887-.518c-.608-.517-1.126-1.318-1.429-1.878l2.075-.85c.134.244.326.62.635.941.532.555 1.245.936 2.108.936.806 0 1.717-.355 2.195-.994.428-.572.595-1.3.595-2.08v-.78c-1.482 1.833-4.721 1.577-6.533-.318-1.937-2.025-1.92-5.312.04-7.337 1.933-1.842 4.801-2.074 6.489-.33l.004.004v-.882h2.248v9.397c0 2.39-.913 3.742-2.047 4.529-.83.576-1.992.84-3.017.84-1.332 0-2.474-.442-3.363-1.198zM.914 35.14C.36 34.99 0 34.44 0 33.59V5.512C0 4.724.305 4.193.789 4l13.798 15.647L.914 35.14zm1.9-.597l16.608-9.413-4.045-4.587-12.564 14zM19.535 14.04L3.16 4.755l12.242 13.97 4.135-4.686zm1.111.63l6.416 3.637c1.215.689 1.226 1.799 0 2.494l-6.578 3.728-4.29-4.897 4.452-4.962z"></path></g></svg>
						</a>
						<span>
							{{trans('messages.svg.for_driver')}}
						</span>
					</li> -->
					<li>
						<a href="{{site_setting('ios_link')}}">
							<svg viewBox="0 0 144 40" xmlns="http://www.w3.org/2000/svg"><g fill="#FFF" fill-rule="evenodd"><path d="M44.064 10.972c.616.07 1.344.112 2.212.112 1.834 0 3.29-.476 4.172-1.358.882-.868 1.358-2.128 1.358-3.668 0-1.526-.49-2.618-1.33-3.388-.826-.77-2.072-1.176-3.822-1.176-.966 0-1.848.084-2.59.196v9.282zm1.218-8.386c.322-.07.798-.126 1.428-.126 2.576 0 3.836 1.414 3.822 3.64 0 2.548-1.414 4.004-4.018 4.004-.476 0-.924-.014-1.232-.07V2.586zm10.99 1.484c-1.876 0-3.36 1.33-3.36 3.598 0 2.142 1.414 3.486 3.248 3.486 1.638 0 3.374-1.092 3.374-3.598 0-2.072-1.316-3.486-3.262-3.486zm-.028.924c1.456 0 2.03 1.456 2.03 2.604 0 1.526-.882 2.632-2.058 2.632-1.204 0-2.058-1.12-2.058-2.604 0-1.288.63-2.632 2.086-2.632zm3.976-.77L62.264 11h1.12l1.092-3.22a20.05 20.05 0 0 0 .616-2.24h.028c.168.798.364 1.47.602 2.226L66.758 11h1.12l2.184-6.776h-1.218l-.966 3.402c-.224.798-.406 1.512-.518 2.198h-.042c-.154-.686-.35-1.4-.602-2.212l-1.05-3.388H64.63l-1.106 3.458c-.224.728-.448 1.456-.602 2.142h-.042c-.126-.7-.308-1.4-.504-2.156l-.896-3.444h-1.26zM71.294 11h1.232V6.926c0-.21.028-.42.084-.574.21-.686.84-1.26 1.652-1.26 1.162 0 1.568.91 1.568 2.002V11h1.232V6.954c0-2.324-1.456-2.884-2.394-2.884-1.12 0-1.904.63-2.24 1.274H72.4l-.07-1.12h-1.092c.042.56.056 1.134.056 1.834V11zm7.77 0h1.232V1.06h-1.232V11zm6.174-6.93c-1.876 0-3.36 1.33-3.36 3.598 0 2.142 1.414 3.486 3.248 3.486 1.638 0 3.374-1.092 3.374-3.598 0-2.072-1.316-3.486-3.262-3.486zm-.028.924c1.456 0 2.03 1.456 2.03 2.604 0 1.526-.882 2.632-2.058 2.632-1.204 0-2.058-1.12-2.058-2.604 0-1.288.63-2.632 2.086-2.632zM94.926 11c-.084-.462-.112-1.036-.112-1.624V6.842c0-1.358-.504-2.772-2.576-2.772-.854 0-1.666.238-2.226.602l.28.812a3.376 3.376 0 0 1 1.764-.504c1.386 0 1.54 1.008 1.54 1.568v.14c-2.618-.014-4.074.882-4.074 2.52 0 .98.7 1.946 2.072 1.946.966 0 1.694-.476 2.072-1.008h.042l.098.854h1.12zm-1.302-2.282c0 .126-.028.266-.07.392-.196.574-.756 1.134-1.638 1.134-.63 0-1.162-.378-1.162-1.176 0-1.316 1.526-1.554 2.87-1.526v1.176zm7.798-7.658v4.046h-.028c-.308-.546-1.008-1.036-2.044-1.036-1.652 0-3.052 1.386-3.038 3.64 0 2.058 1.26 3.444 2.898 3.444 1.106 0 1.932-.574 2.31-1.33h.028l.056 1.176h1.106a21.928 21.928 0 0 1-.056-1.75V1.06h-1.232zm0 7.098c0 .196-.014.364-.056.532-.224.924-.98 1.47-1.806 1.47-1.33 0-2.002-1.134-2.002-2.506 0-1.498.756-2.618 2.03-2.618.924 0 1.596.644 1.778 1.428.042.154.056.364.056.518v1.176zm9.114-4.088c-1.876 0-3.36 1.33-3.36 3.598 0 2.142 1.414 3.486 3.248 3.486 1.638 0 3.374-1.092 3.374-3.598 0-2.072-1.316-3.486-3.262-3.486zm-.028.924c1.456 0 2.03 1.456 2.03 2.604 0 1.526-.882 2.632-2.058 2.632-1.204 0-2.058-1.12-2.058-2.604 0-1.288.63-2.632 2.086-2.632zM115.352 11h1.232V6.926c0-.21.028-.42.084-.574.21-.686.84-1.26 1.652-1.26 1.162 0 1.568.91 1.568 2.002V11h1.232V6.954c0-2.324-1.456-2.884-2.394-2.884-1.12 0-1.904.63-2.24 1.274h-.028l-.07-1.12h-1.092c.042.56.056 1.134.056 1.834V11zm11.018-8.4v1.624h-1.05v.938h1.05v3.696c0 .798.126 1.4.476 1.764.294.336.756.518 1.33.518.476 0 .854-.07 1.092-.168l-.056-.924a2.74 2.74 0 0 1-.714.084c-.686 0-.924-.476-.924-1.316V5.162h1.764v-.938h-1.764V2.278l-1.204.322zm4.354 8.4h1.232V6.912c0-.238.014-.42.084-.588.224-.672.854-1.232 1.652-1.232 1.162 0 1.568.924 1.568 2.016V11h1.232V6.968c0-2.338-1.456-2.898-2.366-2.898-.462 0-.896.14-1.26.35-.378.21-.686.518-.882.868h-.028V1.06h-1.232V11zm13.216-3.164c.014-.126.042-.322.042-.574 0-1.246-.588-3.192-2.8-3.192-1.974 0-3.178 1.61-3.178 3.654 0 2.044 1.246 3.416 3.332 3.416 1.078 0 1.82-.224 2.254-.42l-.21-.882c-.462.196-.994.35-1.876.35-1.232 0-2.296-.686-2.324-2.352h4.76zm-4.746-.882c.098-.854.644-2.002 1.89-2.002 1.386 0 1.722 1.218 1.708 2.002h-3.598zM52.24 30.798L53.582 35h2.904l-4.818-14.828h-3.454L43.462 35h2.794l1.276-4.202h4.708zm-4.268-2.046l1.144-3.652c.264-.88.484-1.914.704-2.772h.044c.22.858.462 1.87.748 2.772l1.166 3.652h-3.806zm10.362 10.604h2.706v-5.544h.044c.55.858 1.672 1.43 3.014 1.43 2.442 0 4.884-1.87 4.884-5.742 0-3.344-2.046-5.456-4.51-5.456-1.628 0-2.882.682-3.674 1.892h-.044l-.132-1.65h-2.376a78.27 78.27 0 0 1 .088 3.564v11.506zm2.706-10.494c0-.22.044-.462.11-.682.264-1.188 1.298-2.002 2.42-2.002 1.738 0 2.662 1.54 2.662 3.432 0 2.112-1.012 3.542-2.728 3.542a2.447 2.447 0 0 1-2.376-1.892 2.788 2.788 0 0 1-.088-.748v-1.65zm10.164 10.494h2.706v-5.544h.044c.55.858 1.672 1.43 3.014 1.43 2.442 0 4.884-1.87 4.884-5.742 0-3.344-2.046-5.456-4.51-5.456-1.628 0-2.882.682-3.674 1.892h-.044l-.132-1.65h-2.376a78.27 78.27 0 0 1 .088 3.564v11.506zm2.706-10.494c0-.22.044-.462.11-.682.264-1.188 1.298-2.002 2.42-2.002 1.738 0 2.662 1.54 2.662 3.432 0 2.112-1.012 3.542-2.728 3.542a2.447 2.447 0 0 1-2.376-1.892 2.788 2.788 0 0 1-.088-.748v-1.65zm14.168 5.434c.814.484 2.442.924 4.004.924 3.828 0 5.632-2.068 5.632-4.444 0-2.134-1.254-3.432-3.828-4.4-1.98-.77-2.838-1.298-2.838-2.442 0-.858.748-1.782 2.464-1.782 1.386 0 2.42.418 2.948.704l.66-2.178c-.77-.396-1.958-.748-3.564-.748-3.212 0-5.236 1.848-5.236 4.268 0 2.134 1.562 3.432 4.004 4.312 1.892.682 2.64 1.342 2.64 2.464 0 1.21-.968 2.024-2.706 2.024a7.493 7.493 0 0 1-3.586-.946l-.594 2.244zm12.342-12.43v2.42h-1.54v2.024h1.54v5.038c0 1.408.264 2.376.836 2.992.506.55 1.342.88 2.332.88.858 0 1.562-.11 1.958-.264l-.044-2.068a3.998 3.998 0 0 1-1.056.132c-1.034 0-1.386-.682-1.386-1.98v-4.73h2.574v-2.024h-2.574v-3.058l-2.64.638zm11.99 2.178c-3.234 0-5.544 2.156-5.544 5.676 0 3.432 2.332 5.522 5.368 5.522 2.728 0 5.5-1.76 5.5-5.698 0-3.256-2.134-5.5-5.324-5.5zm-.066 1.98c1.848 0 2.596 1.914 2.596 3.586 0 2.156-1.078 3.674-2.618 3.674-1.65 0-2.662-1.562-2.662-3.63 0-1.782.77-3.63 2.684-3.63zM119.956 35h2.706v-5.544c0-.308.044-.594.088-.836.242-1.21 1.122-2.046 2.42-2.046.33 0 .572.044.792.088V24.11a2.843 2.843 0 0 0-.638-.066c-1.144 0-2.398.77-2.926 2.288h-.088l-.088-2.046h-2.354c.066.968.088 2.002.088 3.454V35zm16.72-4.598a6.66 6.66 0 0 0 .088-1.144c0-2.354-1.144-5.214-4.62-5.214-3.432 0-5.236 2.794-5.236 5.764 0 3.278 2.046 5.412 5.522 5.412 1.54 0 2.816-.286 3.74-.66l-.396-1.87c-.814.308-1.716.484-2.97.484-1.716 0-3.234-.836-3.3-2.772h7.172zm-7.172-1.892c.11-1.1.814-2.618 2.486-2.618 1.804 0 2.244 1.628 2.222 2.618h-4.708zM22.848 7.973c4.188 0 6.867 4.003 6.867 4.003s-4.086 2.19-4.086 6.946c0 5.645 5.133 7.287 5.133 7.287s-4.052 9.495-8.6 9.495c-2.558 0-2.73-1.453-6.129-1.453-2.952 0-3.947 1.453-6.196 1.453C5.545 35.704 0 26.45 0 18.922c0-7.818 5.614-10.95 9.133-10.95 3.09 0 4.377 1.797 6.866 1.797 2.094 0 3.743-1.796 6.849-1.796zM22.128 0c.617 3.832-2.902 8.572-7.107 8.418C14.403 3.54 18.935.258 22.128 0z"></path></g></svg>
						</a>
						<span>
							{{trans('messages.svg.for_user_apple')}}
						</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</main>
@stop
