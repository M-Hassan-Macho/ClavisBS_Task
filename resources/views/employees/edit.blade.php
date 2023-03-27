@extends('main')
@section('content')
<title>Update employee</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.update_employee')}}</b></h1>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col col-md-6"><b>{{__('messages.update_employee')}}</b></div>
					<div class="col col-md-6">
						<a href="{{route('employees.index')}}" class="btn btn-primary btn-sm float-right">{{__('messages.back')}}</a>
					</div>
				</div>
			</div>

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
			<div class="card-body">
				{!! Form::model($employee, ['method' => 'PATCH','route' => ['employees.update', $employee->id], 'enctype'=>"multipart/form-data"]) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.first_name')}}:</strong>
							{!! Form::text('first_name', null, array('placeholder' => __('messages.first_name'),'class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.last_name')}}:</strong>
							{!! Form::text('last_name', null, array('placeholder' => __('messages.last_name'),'class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.company')}}:</strong>
							{!! Form::text('company', null, array('placeholder' => __('messages.company'),'class' => 'form-control')) !!}
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
					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<button type="submit" class="btn btn-success btn-block">{{__('messages.update')}}</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection('content')