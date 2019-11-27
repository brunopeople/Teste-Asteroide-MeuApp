@extends('parent')

@section('main')
@if($erros->any())

	<div class="alert alert-danger">
		<ul>
			@foreach($erros->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<div align="right">
		<a href="{{route('crud.index')}}" class="btn btn-default">Back</a>

		<form method="post" action="{{route('crud.store')}}" enctype="multipart/form-data">

			@csrf
				<div class="form-group">
					<label class="col-md-4 text-right">Seu Primeiro Nome:</label>
					 <div class="col-md-8">
					 	<input type="text" name="first_name" class="form-control input-lg"/>
					 </div>
				</div>
			</div>
			<br/>
			<br/>
			<br/>
			<div class="form-group">
				<label class="col-md-4 text-right">Seu Sobrenome</label>
				    <div class="col-md-8">
					  <input type="text" name="last_name" class="form-control input-lg"/>
				    </div>
			</div>



			<div class="form-group">
				<label class="col-md-4 text-right">Seu Telefone:</label>
				    <div class="col-md-8">
					  <input type="text" name="phone" class="form-control input-lg"/>
				    </div>
			</div>
		<br/><br/><br/>


		<div class="form-group">
				<label class="col-md-4 text-right">Data Nascimento:</label>
				    <div class="col-md-8">
					  <input type="text" name="phone" class="form-control input-lg"/>
				    </div>
			</div>
		<br/><br/><br/>


		<div class="form-group">
				<label class="col-md-4 text-right">Email:</label>
				    <div class="col-md-8">
					  <input type="text" name="phone" class="form-control input-lg"/>
				    </div>
			</div>
		<br/><br/><br/>

		<div class="form-group text-center">
			<input type="submit" name="add" class="btn btn-primary input-lg" value="Add">
		</div>
	</form>

	@endsection