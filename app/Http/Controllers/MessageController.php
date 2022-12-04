<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    //
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            // return redirect()->back()->withErrors($v);
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json([
            'message' => $message
        ]);
    }

    public function destroy($id)
    {
        Message::destroy($id);
        return response()->json([
            'message' => 'message deleted'
        ]);
    }

}
