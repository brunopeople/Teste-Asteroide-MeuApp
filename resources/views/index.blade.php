@extends('parent')

@section('main')

<table class="table table-bordered table-striped">
 <tr>
  <th width="10%">Image</th>
  <th width="35%">Nome</th>
  <th width="35%">SobreNome</th>
  <th width="35%">Telefone</th>
  <th width="35%">Data Nascimento</th>
  <th width="35%">Endereço</th>
  <th width="35%">Action</th>
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
    
   </td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection
