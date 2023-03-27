@extends('main')

@section('content')
<title>Assign Notes To User</title>
<h1 class="text-primary mt-3 mb-4 text-center"><b>{{__('messages.assign_note_to_user')}}</b></h1>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
		<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>{{__('messages.assign_note_to_user')}}</b></div>
			<div class="col col-md-6">
				<a href="{{route('userhasnotes.index')}}" class="btn btn-primary btn-sm float-right">{{__('messages.back')}}</a>
			</div>
		</div>
	</div>
			<div class="card-body">
				<form action="{{ route('userhasnotes.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group mb-3">
						<select name="user_id" class="form-control">
						<option value="" disabled selected>{{__('messages.select_user')}}</option>
							@foreach ($users as $user)
							<option value="{{ $user->id }}">{{ $user->name }}</option>
							@endforeach
						</select>
						@if($errors->has('name'))
						<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
					</div>
					<div class="form-group mb-3">
						<select name="note_id" class="form-control">
						<option value="" disabled selected>{{__('messages.select_note')}}</option>
							@foreach ($notes as $note)
							<option value="{{ $note->id }}">{{ $note->name }}</option>
							@endforeach
						</select>
						@if($errors->has('name'))
						<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-dark btn-block">{{__('messages.submit')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection('content')