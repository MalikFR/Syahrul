@extends('layouts.global')

@section('title') Create kategori Artikel @endsection

@section('content')
	<div class="col-md-12">
		@if(session('status'))
			<div class="alert alert-success">
		{{session('status')}}
	</div>
@endif
	<form
		enctype="multipart/form-data"
		class="bg-white shadow-sm p-3"
		action="{{route('kategoriartikel.store')}}"
		method="POST">
	
	@csrf
	<label>Nama Kategori</label><br>
	<input
		type="text"
		class="form-control {{$errors->first('nama_kategori') ? "is-invalid" : ""}}"
		value="{{old('nama_kategori')}}"
		name="nama_kategori">
	
	<div class="invalid-feedback">
		{{$errors->first('nama_kategori')}}
	</div>
	<br>

			<div class="from-group">
				<button type="submit" class="btn btn-primary">Tambah</button>
			</div>

		</form>
	</div>
</div>
</div>
</div>
</div>
@endsection


