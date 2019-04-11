@extends('layouts.global')

@section('title') Daftar Carts @endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<form action="{{route('categories.index')}}">
	<div class="input-group">

			<input
				type="text"
				class="form-control"
				placeholder="Cari berdasarkan nama Barang"
				value="{{Request::get('id_produks')}}"
				name="id_produks">
			
			<div class="input-group-append">
			<input
				type="submit"
				value="Cari"
				class="btn btn-primary">
			</div>
		</div>
	</form>
</div>
			
</div>

			<hr class="my-3">

		@if(session('status'))
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-warning">
						{{session('status')}}
					</div>
				</div>
			</div>
		@endif

<div class="row mb-3">
			<div class="col-md-12 text-right">
		<a
		href="{{route('carts.create')}}" class="btn btn-primary">Tambah Data</a>
		</div>
		<br>
		<br>

		<table class="table table-bordered table-stripped">
			<thead>
				<tr>
					<th><b>Nama Produk</b></th>
					<th><b>Subtotal</b></th>
					<th><b>Jumlah</b></th>
					<th><b>User</b></th>
				</tr>
		</thead>
	<tbody>
		@foreach($carts as $cart)
		<tr>
        <td>
		{{ $cart->produks->title }}
		</td>

		<td>{{$cart->subtotal}}</td>
        <td>{{$cart->jumlah}}</td>
		
		<td>		
		{{ $cart->users->name }}
		</td>
					<td>
	<a href="{{route('carts.edit', ['id' => $cart->id])}}"class="btn btn-info btn-sm"> Edit </a>
	
		<form
			method="POST"
			class="d-inline"
			onsubmit="return confirm('Move cart to trash?')"
			action="{{route('carts.destroy', ['id' => $cart->id
			])}}">
		
		@csrf
		
		<input
			type="hidden"
			value="DELETE"
			name="_method">
		<input
			type="submit"
			onclick="return confirm('Yakin ingin menghapus Cart ini?')"
			value="Hapus"
			class="btn btn-danger btn-sm">
		</form>
	</td>
</tr>
			@endforeach
		</tbody>
			<tfoot>
				<tr>
					<td colspan="10">
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
@endsection