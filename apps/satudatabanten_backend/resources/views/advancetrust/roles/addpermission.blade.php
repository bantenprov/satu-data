@extends('home')

@section('advancetrust_content')
  <a href="{{ route('role') }}">Back</a>   

    <h3>Role : {{ $role->name }}</h3>
   
    
    {{ Form::label('name','Role name :') }}
    {{ Form::text('name',$role->name) }}    
    <br> 
    {{ Form::label('description','Descriptio :') }}
    {{ Form::text('description',$role->description) }}           
    <br>
    {{ Form::label('display_name','Display name :') }}
    {{ Form::text('display_name',$role->display_name) }}   
    <br>
    <br>

    {!! Form::open(array('route' => ['storeRolePermission',$role->id], 'method' => 'POST')) !!}
    
    <b>Select permission</b>
    <br>
      <input type="checkbox" onchange="checkAll(this)" id="select_all">All<br>            
        
        @foreach($permissions as $permission) 
                    
          @if(in_array($permission->id,$available_permissions))     
            <input type="checkbox" value="{{ $permission->id }}" checked name="permission[]"> {{ $permission->name }}
            <br>
          @else
            <input type="checkbox" value="{{ $permission->id }}" name="permission[]"> {{ $permission->name }}
            <br>
          @endif          
        @endforeach  
        
        <br>                  
      {{ Form::submit('Update') }}
    {{ Form::close() }}
    <script>    
    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                console.log(i)
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }    
  </script>       
@stop
