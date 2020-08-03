@extends('backend.layouts.app')
@section('title', $username)

@section('content')
<section class="cover" style="background-image:url({{url('media/cover_default.png')}})">
	<div class="overlay"></div>
	<div class="container-fluid">
		<div class="user">
			<figure>
				@if($id == @Auth::user()->id)
				<a href="">
					<div>
						<img src="{{url('media/user.jpg')}}">
					</div>
				</a>
				@else
                <img src="{{url('media/user.jpg')}}">
				@endif
			</figure>
			<div class="desc">
				<div class="name">{{$name}} {!! $email_verified_at != null ? '<div class="verified" title="Verified"></div>' : '' !!}</div>
				<div class="info">{{"@".$username}}</div>
				@if(Auth::check() && $id !== @Auth::user()->id)
					<div class="cta-forgif">
					<a href="" class="btn btn-primary"><i class="ion ion-plus"></i> Follow</a>
					</div>
				@endif
			</div>
		</div>
		@if($id == @Auth::user()->id)
		<div class="cta">
			<a href="" class="btn btn-primary"><i class="ion ion-edit"></i> Change Cover</a>
		</div>
		@endif
	</div>
</section>

<section>
  <div class="container-fluid">
    <div class="row">
	    <div class="col-md-8 col-md-offset-2">
		    <div class="user-info-group">	    	
			    <div class="user-info">
			    	<div class="user-info-item">
			    		<div>
			    			<div class="name"><a href="">Posts</a></div>
			    			<div class="value">0</div>
			    		</div>
			    	</div>
			    	<div class="user-info-item">
			    		<div>
			    			<div class="name"><a href="">Following</a></div>
			    			<div class="value">0</div>
			    		</div>
			    	</div>
			    	<div class="user-info-item">
			    		<div>
			    			<div class="name"><a href="">Followers</a></div>
			    			<div class="value">0</div>
			    		</div>
			    	</div>
			    </div>
			    <div class="user-info-bio">
			    </div>
		    </div>
	    </div>
		</div>
	  @if(isset($forgifings))
	  	<div class="row">
	  		<div class="col-md-8 col-md-offset-2 col-sm-12">
	  			<div class="panel padding">
		  			<div class="panel-heading">
		  				<h4>Forgifings</h4>
		  			</div>
		  			<div class="panel-body">
			  			@if(!count($forgifings))
				  			<p class="text-center"><i>{{firstname($user->name)}} never forgifing anyone.</i></p>
			  			@else
								<ul class="user-list">
									@foreach($forgifings as $user)
									<li class="friend-list-{{$user->users_from->id}}">
										<figure>
											<a href="{{route('users.detail', $user->users_from->username)}}">
												<img src="{!! avatar($user->users_from->picture, '_md') !!}" alt="{{$user->users_from->name}}">
											</a>
										</figure>
										<div class="desc">
											<div class="name"><a href="{{route('users.detail', $user->users_from->username)}}">{{$user->users_from->name}}</a></div>
											<div class="action">
												{{'@'.$user->users_from->username}}
											</div>
										</div>
									</li>
									@endforeach
								</ul>
								<div class="text-center">
									{!! $forgifings->links() !!}
								</div>
			  			@endif
		  			</div>
	  			</div>
	  		</div>
	  	</div>
	  @elseif(isset($forgifers))
	  	<div class="row">
	  		<div class="col-md-8 col-md-offset-2 col-sm-12">
	  			<div class="panel padding">
		  			<div class="panel-heading">
		  				<h4>Forgifers</h4>
		  			</div>
		  			<div class="panel-body">
			  			@if(!count($forgifers))
				  			<p class="text-center"><i>{{firstname($user->name)}} has no one forgifers.</i></p>
			  			@else
								<ul class="user-list">
									@foreach($forgifers as $user)
									<li class="friend-list-{{$user->users->id}}">
										<figure>
											<a href="{{route('users.detail', $user->users->username)}}">
												<img src="{!! avatar($user->users->picture, '_md') !!}" alt="{{$user->users->name}}">
											</a>
										</figure>
										<div class="desc">
											<div class="name"><a href="{{route('users.detail', $user->users->username)}}">{{$user->users->name}}</a></div>
											<div class="action">
												{{'@'.$user->users->username}}
											</div>
										</div>
									</li>
									@endforeach
								</ul>
								<div class="text-center">
									{!! $forgifers->links() !!}
								</div>
			  			@endif
		  			</div>
	  			</div>
	  		</div>
	  	</div>
	  @else
	    <div class="row">
		    <div class="col-md-8 col-md-offset-2 col-sm-12">
	 
		    </div>
	    </div>
	  @endif
  </div>
</section>
@stop

@section('js')
<script>
getStatus($("[data-status-loader-me]"), '{{$id}}');
$(window).scroll(function(){
  if($(window).scrollTop() >= ($(document).height() - $(window).height()) - 100){
    getStatus($("[data-status-loader-me]"), '{{$id}}');
  }
});
</script>
@stop