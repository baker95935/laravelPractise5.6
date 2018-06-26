@extends('layouts.app')

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">管理项目</div>

        <div class="panel-body">
        <a href="{{ URL('projects/create') }}" class="btn btn-lg btn-primary">新增</a>
        <table class="table table-striped">
          <tr class="row">
            <th class="col-lg-2">标题</th>
            <th class="col-lg-2">作者</th>
            <th class="col-lg-4">查看</th>
            <th class="col-lg-1">编辑</th>
            <th class="col-lg-1">删除</th>
          </tr>
          @foreach ($projects as $project)
            <tr class="row">
              <td class="col-lg-2">
                    {{ $project->name }}
              </td>
              <td class="col-lg-2">
                    {{ $project->author }}
              </td>
              <td class="col-lg-4">
                <a href="{{ URL('projects/show/'.$project->id) }}" target="_blank">
                  {{ App\Projects::find($project->id)->name }}
                </a>
              </td>
              <td class="col-lg-1">
                <a href="{{ URL('projects/'.$project->id.'/edit') }}" class="btn btn-success">编辑</a>
              </td>
              <td class="col-lg-1">
                <form action="{{ URL('projects/'.$project->id) }}" method="POST" style="display: inline;">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-danger">删除</button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>

 
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection