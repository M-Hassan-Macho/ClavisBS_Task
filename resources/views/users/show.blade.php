@extends('main')

@section('content')
<title>User Profile</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.user_profile')}}</b></h1>
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>{{__('messages.user_profile')}}</b></div>
			<div class="col col-md-6">
				<a href="{{route('users.index')}}" class="btn btn-primary btn-sm float-right">{{__('messages.view_all')}}</a>
			</div>
		</div>
	</div>
	<div class="card-body">
	<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.profile_image')}}:</strong><br>
            <img src="{{ asset('images/Admins-images/'.$user->image) }}" width="200" class="img-thumbnail" />
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.name')}}:</strong>
            {{ $user->username }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.email')}}:</strong>
            {{ $user->email }}
        </div>
    </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.phone')}}:</strong>
            {{ $user->phone }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.status')}}:</strong>
				@if($user->user_status == 1)
				<td><label class="badge badge-success">{{__('messages.active')}}</label></td>
				@else
				<td><label class="badge badge-danger">{{__('messages.inactivate')}}</label></td>
				@endif	
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.roles')}}:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
	</div>
</div>

@endsection('content')