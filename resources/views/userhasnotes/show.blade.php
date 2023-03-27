@extends('main')

@section('content')
<title>Assign Notes To User</title>
@if(count($user) > 0)
<h1 class="text-primary mt-3 mb-4 text-center"><b>Users Notes</b></h1>
@else
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.no_data')}}</b></h1>
@endif
<div class="card">
	<div class="card-header">
		<div class="row">

			<div class="col col-md-6"><b>{{__('messages.user_notes')}}</b></div>

			<div class="col col-md-6">
				<a href="{{ route('userhasnotes.index') }}" class="btn btn-success float-right">{{__('messages.back')}}</a>
			</div>
		</div>
	</div>

	@if($message = Session::get('success'))

	<div class="alert alert-success col col-md-4">
		{{ $message }}
	</div>

	@endif

	<div class="card-body">
		<table class="table table-bordered">
			<tr>
				<th>{{__('messages.title')}}</th>
				<th>{{__('messages.body')}}</th>
				<th>{{__('messages.actions')}}</th>
			</tr>
			@if(count($data) > 0)
			@foreach($data as $row)
			<tr>
				<td><img src="{{asset('images/notes-images/'.$row->image)}}" width="75" class="img img-responsive" /></td>
				<td>{{$row->title}}</td>
				<td>{{$row->body}}</td>
				<td>
					<form method="post" action="{{ route('userhasnotes.destroy', $row->user_has_notes_id)}}">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger btn-sm" value="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
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