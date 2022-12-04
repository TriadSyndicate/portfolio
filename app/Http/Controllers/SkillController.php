<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{

    public function store(Request $request)
    {
        $filePath = $request->file('skill_image')->store('public/skills_images');
        //
        $validator = Validator::make($request->all(), [
            'skill_title' => 'required|string|max:255',
            'skill_description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            // return redirect()->back()->withErrors($v);
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        $skill = Skill::create([
            'skill_title' => $request->skill_title,
            'skill_image' => $filePath,
            'skill_description' => $request->skill_description,
        ]);

        return response()->json([
            'skill' => $skill
        ]);
    }
    public function update(Request $request, $id){
        $skill = Skill::find($id);
        $skill->skill_title = $request->skill_title;
        $skill->skill_description = $request->skill_description;
        if($request->hasFile('skill_image')){
            $filePath = $request->file('skill_image')->store('public/skills_images');
            $skill->skill_image = $filePath;
        }
        if($skill->save()){
            return response()->json([
                'skill' => $skill
            ]);
        }
    }
    public function destroy($id){
        $skill = Skill::find($id);
        if($skill->delete()){
            return response()->json([
                'skill' => $skill
            ]);
        }
    }
}
