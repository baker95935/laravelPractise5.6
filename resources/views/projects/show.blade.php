@extends('layouts.app')
 
@section('content')
<div class="container"> 
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">显示项目</div>
 
        <div class="panel-body">
 
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
 
       
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            项目标题：{{ $project->name }}
            <br>
       项目作者：{{ $project->author }}
            <br>            
            <br>
          
             <br>
     项目内容：{{ $project->description }}
            <br>
            
           
 
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection