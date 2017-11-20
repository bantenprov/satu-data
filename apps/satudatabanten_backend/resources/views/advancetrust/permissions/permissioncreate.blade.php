@extends('home')

@section('advancetrust_content')
  <a href="{{ route('permission') }}">Back</a>   

    <h3>Create new permission</h3>

  {!! Form::open(array('route' => 'storePermission', 'method' => 'POST')) !!}
    {{ Form::label('name','Permission name :') }}
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
