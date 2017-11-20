@extends('home')

@section('advancetrust_content')
  <a href="{{ route('permission') }}">Back</a>   

    <h3>Update permission</h3>    

  {!! Form::open(array('route' => ['updatePermission',$permission->id], 'method' => 'POST')) !!}
    {{ Form::label('name','Permission name :') }}
    {{ Form::text('name',$permission->name) }}       
    <br>     
    {{ Form::label('description','Description :') }}
    {{ Form::text('description',$permission->description) }}      
    <br>
    {{ Form::label('display_name','Display name :') }}
    {{ Form::text('display_name',$permission->display_name) }}            
    <br>    
    {{ Form::submit('Update role') }} 
  {{ Form::close() }}

  <script>
    
  </script>

@stop
