@extends('main')

@section('content')
<title>User Register</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.user_registration')}}</b></h1>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col col-md-6"><b>{{__('messages.user_registration')}}</b></div>
					<div class="col col-md-6">
						<a href="{{route('users.index')}}" class="btn btn-primary btn-sm float-right">{{__('messages.back')}}</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				{!! Form::open(array('route' => 'users.store','method'=>'POST','enctype'=>"multipart/form-data")) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.name')}}:</strong>
							{!! Form::text('username', null, array('placeholder' => __('messages.name'),'class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.email')}}:</strong>
							{!! Form::text('email', null, array('placeholder' => __('messages.email'),'class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.phone')}}:</strong>
							{!! Form::text('phone', null, array('placeholder' => __('messages.phone'),'class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.password')}}:</strong>
							{!! Form::password('password', array('placeholder' => __('messages.password'),'class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.confirm_password')}}:</strong>
							{!! Form::password('confirm-password', array('placeholder' => __('messages.confirm_password'),'class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.status')}}:</strong>
							<div class="form-group">
								<div>
									<strong>{{__('messages.activate')}}</strong>
									{!! Form::radio('user_status', '1', false) !!}
								</div>
								<div>
									<strong>{{__('messages.inactivate')}}</strong>
									{!! Form::radio('user_status', '0', false) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.image')}}:</strong>
							{{Form::file('image')}}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.role')}}:</strong>
							{!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	@endsection('content')