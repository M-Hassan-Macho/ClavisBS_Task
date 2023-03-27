@extends('main')

@section('content')
<title>companies</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.companies')}}</b></h1>

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>{{__('messages.companies_data')}}</b></div>
			@can('company-create')
			<div class="col col-md-6">
				<a href="{{ route('companies.create') }}" class="btn btn-success float-right">{{__('messages.company_register')}}</a>
			</div>
			@endcan
		</div>
	</div>

	<div class="card-body">
		@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		@endif
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<th>E-mail</th>
				<th>Website</th>
				<th>{{__('messages.settings')}}</th>
			</tr>
			@if(count($data) > 0)

			@foreach($data as $row)

			<tr>
				<td><img src="{{asset('images/Admins-images/'.$row->image)}}" width="75" class="img img-responsive" /></td>
				<td>{{$row->name}}</td>
				<td>{{$row->email}}</td>
				<td>{{$row->website}}</td>
				
				<td>
					<form method="post" action="{{ route('companies.destroy', $row->id)}}">
						@csrf
						@method('DELETE')
						<a href="{{route('companies.show', $row->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
						@can('company-edit')
						<a href="{{route('companies.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pen-square" aria-hidden="true"></i></a>
						@endcan	
						@can('company-delete')
						<button type="submit" class="btn btn-danger btn-sm" value="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
						@endcan
					</form>

				</td>
			</tr>

			@endforeach

			@else
			<tr>
				<td colspan="5" class="text-center">{{__('messages.no_data')}}</td>
			</tr>
			@endif
			<tr>
				{!! $data->links('pagination.default') !!}
			</tr>
		</table>
	</div>
</div>
@endsection('content')