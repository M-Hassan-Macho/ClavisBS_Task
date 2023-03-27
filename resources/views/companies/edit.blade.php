@extends('main')
@section('content')
<title>Update company</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.update_company')}}</b></h1>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col col-md-6"><b>{{__('messages.update_company')}}</b></div>
					<div class="col col-md-6">
						<a href="{{route('companies.index')}}" class="btn btn-primary btn-sm float-right">{{__('messages.back')}}</a>
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
				{!! Form::model($company, ['method' => 'PATCH','route' => ['companies.update', $company->id], 'enctype'=>"multipart/form-data"]) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>{{__('messages.name')}}:</strong>
							{!! Form::text('name', null, array('placeholder' => __('messages.name'),'class' => 'form-control')) !!}
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
							<strong>{{__('messages.website')}}:</strong>
							{!! Form::text('website', null, array('placeholder' => __('messages.website'),'class' => 'form-control')) !!}
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