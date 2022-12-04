<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        $experiences = Experience::all();
        return response()->json([
            'experiences' => $experiences
        ]);
    }

    public function admin(){
        $user = auth()->user();
        return Inertia::render('Admin', [
            'experiences' => Experience::all(),
            'user' => $user,
            'messages'  => \App\Models\Message::all(),
            'skills'    => \App\Models\Skill::all(),
            'projects'  => \App\Models\Project::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $filePath = $request->file('company_logo')->store('public/company_logos');
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            // return redirect()->back()->withErrors($v);
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        $filePath2 = [];
        foreach ($request->tech_stacks as $file) {
            $x = $file->store('public/tech_stacks');
            array_push($filePath2, $x);
        }
        $experience = Experience::create([
            'title' => $request->title,
            'company_logo' => $filePath,
            'company' => $request->company,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'tech_stacks' => $filePath2,
        ]);

        return response()->json([
            'experience' => $experience
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // return response()->json([
        //     'experience' => $request->all()
        // ]);
        $experience = Experience::find($id);
        $experience->title = $request->title;
        $experience->company = $request->company;
        $experience->location = $request->location;
        
        $experience->description = $request->description;
        if(isset($request->company_logo)){
            $filePath = $request->file('company_logo')->store('public/company_logos');
            $experience->company_logo = $filePath;
        }
        if(isset($request->tech_stacks)){
            $filePath2 = [];
            foreach ($request->tech_stacks as $file) {
                $x = $file->store('public/tech_stacks');
                array_push($filePath2, $x);
            }
            $experience->tech_stacks = $filePath2;
        }
        if(isset($request->start_date)){
            $experience->start_date = $request->start_date;
        }
        if(isset($request->end_date)){
            $experience->end_date = $request->end_date;
        }

        if($experience->save()){
            return response()->json([
                'experience' => $experience
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        $experience = Experience::find($id);
        $experience->delete();
        return response()->json([
            'message' => $experience
        ]);
    }
}
