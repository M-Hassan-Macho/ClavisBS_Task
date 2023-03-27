@extends('main')

@section('content')
<title>Users</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.users')}}</b></h1>

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>{{__('messages.users_data')}}</b></div>
			@can('userhasnotes-create')
			<div class="col col-md-6">
				<a href="{{ route('userhasnotes.create') }}" class="btn btn-success float-right">{{__('messages.assign_note_to_user')}}</a>
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
				<th>{{__('messages.name')}}</th>
				<th>{{__('messages.settings')}}</th>
			</tr>
			@if(count($data) > 0)

			@foreach($data as $row)

			<tr>
				<td>{{$row->username}}</td>
				<td>
						<a href="{{route('userhasnotes.show', $row->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
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