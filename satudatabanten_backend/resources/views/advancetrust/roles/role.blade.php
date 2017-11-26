@extends('home')

@section('advancetrust_content')
  <a href="{{ route('role_create') }}">Add new role</a>
  <table border='1'>
    <tr>
      <th>Role</th>
      <th>Description</th>
      <th>Display name</th>
      <th>Action</th>
    </tr>
    @foreach($roles as $role)            
      <tr>
        <td>{{ $role->name }}</td>
        <td>{{ $role->description }}</td>
        <td>{{ $role->display_name }}</td>
        <td>
          <a href="{{ route('role_show',$role->id) }}">View</a> |
          <a href="{{ route('role_edit',$role->id) }}">Edit</a> | 
          <a href="{{ route('role_add_permission',$role->id) }}">Add permission</a> |
          <a href="{{ route('role_destroy',$role->id) }}">Delete</a>
        </td>        
      </tr>           
    @endforeach
  </table> 

@stop

