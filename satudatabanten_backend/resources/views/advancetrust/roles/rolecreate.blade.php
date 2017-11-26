@extends('home')

@section('advancetrust_content')
  <a href="{{ route('role') }}">Back</a>   

    <h3>Create new role</h3>  
  {!! Form::open(array('route' => 'storeRole', 'method' => 'POST')) !!}
    {{ Form::label('name','Role name :') }}
    {{ Form::text('name') }}       
    <br>     
    {{ Form::label('description','Description :') }}
    {{ Form::text('description') }}      
    <br>
    {{ Form::label('display_name','Display name :') }}
    {{ Form::text('display_name') }}            
    <br>    
    {{ Form::submit('Add') }} 
  {{ Form::close() }}

  <script>
    
  </script>

@stop
