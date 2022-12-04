<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    //
    public function store(Request $request)
    {
        $filePath = $request->file('project_image')->store('public/project_images');
        //
        $validator = Validator::make($request->all(), [
            'project_title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            // return redirect()->back()->withErrors($v);
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        $project = Project::create([
            'project_title' => $request->project_title,
            'project_image' => $filePath,
            'project_url' => $request->project_url,
            'project_description' => $request->project_description,
        ]);

        return response()->json([
            'project' => $project
        ]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->project_title = $request->project_title;
        $project->project_url = $request->project_url;
        $project->project_description = $request->project_description;
        if($request->hasFile('project_image')){
            $filePath = $request->file('project_image')->store('public/project_images');
            $project->project_image = $filePath;
        }
        $project->save();

        return response()->json([
            'project' => $project
        ]);
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        return response()->json([
            'message' => $project
        ]);
    }
}
