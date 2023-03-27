@extends('main')

@section('content')
<title>Employees</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.employees')}}</b></h1>

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>{{__('messages.employees_data')}}</b></div>
			@can('employee-create')
			<div class="col col-md-6">
				<a href="{{ route('employees.create') }}" class="btn btn-success float-right">{{__('messages.employee_register')}}</a>
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
				<th>{{__('messages.first_name')}}</th>
				<th>{{__('messages.last_name')}}</th>
				<th>{{__('messages.company')}}</th>
				<th>{{__('messages.email')}}</th>
				<th>{{__('messages.phone')}}</th>
				<th>{{__('messages.settings')}}</th>
			</tr>
			@if(count($data) > 0)

			@foreach($data as $row)

			<tr>
				<td>{{$row->first_name}}</td>
				<td>{{$row->last_name}}</td>
				<td>{{$row->company}}</td>
				<td>{{$row->email}}</td>
				<td>{{$row->phone}}</td>
				<td>
					<form method="post" action="{{ route('employees.destroy', $row->id)}}">
						@csrf
						@method('DELETE')
						<a href="{{route('employees.show', $row->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
						@can('employee-edit')
						<a href="{{route('employees.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pen-square" aria-hidden="true"></i></a>
						@endcan	
						@can('employee-delete')
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