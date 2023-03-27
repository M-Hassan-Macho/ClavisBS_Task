@extends('main')

@section('content')
<title>Users</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.users')}}</b></h1>

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>{{__('messages.users_data')}}</b></div>
			@can('user-create')
			<div class="col col-md-6">
				<a href="{{ route('users.create') }}" class="btn btn-success float-right">{{__('messages.user_register')}}</a>
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
				<th>{{__('messages.image')}}</th>
				<th>{{__('messages.name')}}</th>
				<th>{{__('messages.email')}}</th>
				<th>{{__('messages.phone')}}</th>
				<th>{{__('messages.role')}}</th>
				<th>{{__('messages.status')}}</th>
				<th>{{__('messages.settings')}}</th>
			</tr>
			@if(count($data) > 0)

			@foreach($data as $row)

			<tr>
				<td><img src="{{asset('images/Admins-images/'.$row->image)}}" width="75" class="img img-responsive" /></td>
				<td>{{$row->username}}</td>
				<td>{{$row->email}}</td>
				<td>{{$row->phone}}</td>
				<td>
					@if(!empty($row->getRoleNames()))
					@foreach($row->getRoleNames() as $v)
					<label class="badge badge-success">{{ $v }}</label>
					@endforeach
					@endif
				</td>
				@if($row->user_status == 1)
				<td><label class="badge badge-success">{{__('messages.active')}}</label></td>
				@else
				<td><label class="badge badge-danger">{{__('messages.inactive')}}</label></td>
				@endif
				<td>
					<form method="post" action="{{ route('users.destroy', $row->id)}}">
						@csrf
						@method('DELETE')
						<a href="{{route('users.show', $row->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
						@can('user-edit')
						<a href="{{route('users.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pen-square" aria-hidden="true"></i></a>
						@endcan	
						@can('user-delete')
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