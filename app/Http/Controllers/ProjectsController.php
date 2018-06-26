<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;

class ProjectsController extends Controller
{
	/**
     *保存
     */
    public function store(Request $request)
    {
        $projects = new Projects;
        $projects->name = $request->input('name');
        $projects->author = $request->input('author');
        $projects->description = $request->input('description');
        if ($projects->save()) {
            return redirect('projects');
        } else {
            return back()->withInput()->withErrors('添加失败，请重试');
        }
    }
    
    
   //更新
    public function update(Request $request,$id)
    {
        $projects = Projects::find($id); 
        $projects->name = $request->input('name');
        $projects->author = $request->input('author');
        $projects->description = $request->input('description');

        
        
        if ($projects->save()) {
            return redirect('projects');
        } else {
            return back()->withInput()->withErrors('更新失败，请重试');
        }
    }
    
 
    //添加
    public function create()
    {
        return view('projects.create');
    }
    
 
    //编辑
    public function edit($id)
    {
        $project=Projects::find($id);

        return view('projects.edit',compact('project'));
    }
    
 
    //删除
    public function destroy($id)
    {
        $project = Projects::find($id);
        $project->delete();
        return redirect('projects');
    }
    
  
    //列表
    public function index()
    {
        $projects = Projects::all();
    	return view('projects.index',compact('projects'));
    }
    
    
  
    //显示
    public function show($id)
    {
        $project=Projects::find($id);
        return view('projects.show',compact('project'));
    }
}
