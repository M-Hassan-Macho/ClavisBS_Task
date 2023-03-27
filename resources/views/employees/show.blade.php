@extends('main')

@section('content')
<title>employee Profile</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.employee_profile')}}</b></h1>
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>{{__('messages.employee_profile')}}</b></div>
			<div class="col col-md-6">
				<a href="{{route('employees.index')}}" class="btn btn-primary btn-sm float-right">{{__('messages.view_all')}}</a>
			</div>
		</div>
	</div>
	<div class="card-body">
	<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.first_name')}}:</strong>
            {{ $employee->first_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.last_name')}}:</strong>
            {{ $employee->last_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.company')}}:</strong>
            {{ $employee->company }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.email')}}:</strong>
            {{ $employee->email }}
        </div>
    </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.phone')}}:</strong>
            {{ $employee->phone }}
        </div>
    </div>
</div>
	</div>
</div>

@endsection('content')