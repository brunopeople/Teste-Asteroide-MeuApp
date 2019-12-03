@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div align="right">
	<a href="{{ route('crud.index') }}" class="btn btn-default">Voltar</a>
</div>

<form method="post" action="{{ route('crud.store') }}" enctype="multipart/form-data">

	@csrf
	<div class="form-group">
		<label class="col-md-4 text-right">Seu Primeiro Nome:</label>
		<div class="col-md-8">
			<input type="text" name="name" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Seu Sobrenome:</label>
		<div class="col-md-8">
			<input type="text" name="surname" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />

	<div class="form-group">
		<label class="col-md-4 text-right">Email:</label>
		<div class="col-md-8">
			<input type="text" name="email" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />


	<div class="form-group">
		<label class="col-md-4 text-right">Data Nascimento:</label>
		<div class="col-md-8">
			<input type="text" name="data" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />


<div class="form-group">
		<label class="col-md-4 text-right">Seu Endereço:</label>
		<div class="col-md-8">
			<input type="text" name="adress" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />


	<div class="form-group">
		<label class="col-md-4 text-right">Selecione sua foto</label>
		<div class="col-md-8">
			<input type="file" name="image" />
		</div>
	</div>
	<br /><br /><br />
	<div class="form-group text-center">
		<input type="submit" name="add" class="btn btn-primary input-lg" value="Cadastrar"/>
	</div>

</form>

@endsection



