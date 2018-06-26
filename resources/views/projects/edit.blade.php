@extends('layouts.app')

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑项目</div>

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

          <form action="{{ URL('projects/'.$project->id) }}" enctype="multipart/form-data" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            项目标题：<input type="text" name="name" class="form-control" required="required" value="{{ $project->name }}">
            <br>
             项目作者：<input type="text" name="author" class="form-control" required="required" value="{{ $project->author }}">      
            <br>
         
             <br>
     项目内容：<textarea name="description" rows="10" class="form-control" required="required">{{ $project->description }}</textarea>
            <br>
            <button class="btn btn-lg btn-info">编辑项目</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>  
@endsection