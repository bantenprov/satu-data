@extends('home')

@section('advancetrust_content')
  <a href="{{ route('permission') }}">Back</a>   

    <h3>Permission : {{ $permission->name }}</h3>
    
    {{ Form::label('name','Permission name :') }}
    {{ Form::text('name',$permission->name,['readonly']) }}    
    <br> 
    {{ Form::label('description','Descriptio :') }}
    {{ Form::text('description',$permission->description,['readonly']) }}           
    <br>
    {{ Form::label('display_name','Display name :') }}
    {{ Form::text('display_name',$permission->display_name,['readonly']) }}                     

@stop

