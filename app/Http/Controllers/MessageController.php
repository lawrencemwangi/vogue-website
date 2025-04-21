<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::orderBy('created_at','desc')->get();
        return view('adminside.messages.list_messages', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'names' => 'required|string',
            'email' => 'required|string|lowercase|email:rfc,dns|max:255',
            'message' => 'required|string',
        ]);

        $messages = new Message;
        $messages->names = $validated_data['names'];
        $messages->email = $validated_data['email'];
        $messages->message = $validated_data['message'];
        // dd($messages);

        $messages->save();

        return back()->with('success', [
            'message' => 'Message sent successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
