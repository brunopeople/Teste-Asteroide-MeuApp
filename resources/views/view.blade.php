@extends('parent')

@section('main')

<div class="jumbotron text-center">
	<div align="right">
		<a href="{{ route('crud.index') }}" class="btn btn-default">Voltar</a>
	</div>
   <br/>

   <img src="{{URL::to('/')}}/images/{{$data->image}}" class="img-thumbnail"/>
   		<h3>Nome - {{$data->first_name}}</h3>
   		<h3>Sobrenome - {{$data->last_name}}</h3>
   		<h3>Telefone - {{$data->phone}}</h3>
   		<h3>Data Nascimento - {{$data->data}}</h3>
   		<h3>Email - {{$data->email}}</h3>
   		<h3>Endereço - {{$data->adress}}</h3>
</div>

@endsection