@extends('home')

@section('advancetrust_content')
  <a href="{{ route('role') }}">Back</a>   

    <h3>Role : {{ $role->name }}</h3>
    
    {{ Form::label('name','Role name :') }}
    {{ Form::text('name',$role->name,['readonly']) }}    
    <br>         
    {{ Form::label('description','Description :') }}
    {{ Form::text('description',$role->description,['readonly']) }}  
    <br>         
    {{ Form::label('display_name','Display name :') }}
    {{ Form::text('display_name',$role->display_name,['readonly']) }}         

    <br>

    <h3>Permission : </h3>
    @foreach($role->permissions as $permission)
      <li>{{ $permission->name }}</li>
    @endforeach
@stop
