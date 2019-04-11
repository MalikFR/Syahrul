@extends("layouts.global")
@section("title") Daftar Users @endsection
@section("content")
<form action="{{route('users.index')}}">
	<div class="row">
	<div class="col-md-6">
		<input
			value="{{Request::get('keyword')}}"
			name="keyword"
			class="form-control"
			type="text"
			placeholder="Masukan email untuk filter..."/>
	</div>
	<div class="col-md-6">


		<input
			type="submit"
			value="Filter"
			class="btn btn-primary">
		</div>
	</div>
</form>
				<br>
				@if(session('status'))
					<div class="alert alert-success">
				{{session('status')}}
			</div>
				@endif



				<br>
				<table class="table table-bordered">
				<thead>
				<tr>
				<th><b>Nama</b></th>
				<th><b>Email</b></th>
			</tr>
		</thead>
	<tbody>

				@foreach($users as $user)
				<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>



		</tr>
			@endforeach
	</tbody>
	<tfoot>
				<tr>
					<td colspan=10>{{$users->links()}}
				</td>
			</tr>
		</tfoot>
</table>
@endsection
