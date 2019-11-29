@extends('parent')

@section('main')

<div align="right">
  <a href="{{ route('crud.create')}}" class="btn btn-sucess btn-sm">Cadastrar</a>
</div>
<br/>

@if($message = Session::get('sucess'))
  <div class="alert alert-sucess">
    <p>{{ $message }}</p>
  </div>
@endif

<table class="table table-bordered table-striped">
 <tr>
    <th width="10%">Image</th>
    <th width="15%">Nome</th>
    <th width="15%">SobreNome</th>
    <th width="15%">Telefone</th>
    <th width="15%">Data Nascimento</th>
    <th width="15%">Endereço</th>
    <th width="10%">Acão</th>
 </tr>

 @foreach($data as $row)
  <tr>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $row->first_name }}</td>
   <td>{{ $row->last_name }}</td>
   <td>{{ $row->phone}}</td>
   <td>{{ $row->adress}}</td>
   <td>{{ $row->data}}</td>
   <td>{{ $row->email}}</td>

   <td>
     <form action="{{route('crud.destroy',$row->id)}}" method="post">
        <a href="{{ route('crud.show',$row->id) }}" class="btn btn-primary">Mostrar</a>
        <a href="{{ route('crud.edit', $row->id) }}"class="btn btn-warning">Editar</a>
        @csrf
        @method('DELETE')
          <button type="submit" class="btn btn-danger">Deletar</button>
      </form>
   </td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection
