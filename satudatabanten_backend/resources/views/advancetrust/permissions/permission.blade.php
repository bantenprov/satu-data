@extends('home')

@section('advancetrust_content')
  <a href="{{ route('permission_create') }}">Add new permission</a>
  <table border='1'>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Display name</th>
      <th>Action</th>
    </tr>
    @foreach($permissions as $permission)            
      <tr>
        <td>{{ $permission->name }}</td>
        <td>{{ $permission->description }}</td>
        <td>{{ $permission->display_name }}</td>
        <td>
          <a href="{{ route('permission_show',$permission->id) }}">View</a> |
          <a href="{{ route('permission_edit',$permission->id) }}">Edit</a> | 
          <a href="{{ route('permission_destroy',$permission->id) }}">Delete</a>
        </td>        
      </tr>           
    @endforeach
  </table> 

@stop
