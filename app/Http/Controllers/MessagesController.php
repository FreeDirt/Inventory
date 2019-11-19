<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;

class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function submit(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        // Create New Message
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        
        // Create New Message
        $message->save();
        
        // Return Back
        return back()->with('success', 'Message Sent!');

        // Redirect
        // return redirect('/')->with('success', 'Message Sent!');
    }

    public function getMessages(){
        $id = auth()->user()->id;
        $current_user = User::find($id);
        $messages = Message::all();

        return view('messages', compact('current_user', 'messages'));
        // return view('messages')->with('messages', $messages);
    }
}
