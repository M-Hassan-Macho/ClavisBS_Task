@extends('main')

@section('content')
<title>company Profile</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.company_profile')}}</b></h1>
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>{{__('messages.company_profile')}}</b></div>
			<div class="col col-md-6">
				<a href="{{route('companies.index')}}" class="btn btn-primary btn-sm float-right">{{__('messages.view_all')}}</a>
			</div>
		</div>
	</div>
	<div class="card-body">
	<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.name')}}:</strong>
            {{ $company->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.email')}}:</strong>
            {{ $company->email }}
        </div>
    </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{__('messages.website')}}:</strong>
            {{ $company->website }}
        </div>
    </div>
</div>
	</div>
</div>

@endsection('content')