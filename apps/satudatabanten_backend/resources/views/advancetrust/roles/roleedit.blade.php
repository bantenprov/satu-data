@extends('home')

@section('advancetrust_content')
  <a href="{{ route('role') }}">Back</a>   

    <h3>Update role</h3>  
  {!! Form::open(array('route' => ['updateRole',$role->id], 'method' => 'POST')) !!}
    {{ Form::label('name','Role name :') }}
    {{ Form::text('name',$role->name) }}       
    <br>     
    {{ Form::label('description','Description :') }}
    {{ Form::text('description',$role->description) }}      
    <br>
    {{ Form::label('display_name','Display name :') }}
    {{ Form::text('display_name',$role->display_name) }}            
    <br>    
    {{ Form::submit('Update role') }} 
  {{ Form::close() }}

  <script>
    
  </script>

@stop
