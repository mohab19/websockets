<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;

use App\Events\NewMessage;

use App\Models\Message;
use App\Models\Channel;
use App\Models\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Channel $channel, MessageRequest $request)
    {
        try {
            $user   = User::findOrFail($request->user_id);
            $create = Message::create([
                'body'       => $request->body,
                'channel_id' => $channel->id,
                'user_id'    => $user->id,
            ]);

            broadcast(new NewMessage($create));

            $data = array(
                'topic' => $channel->slug,
                'data'  => $request->body,
            );

            return response()->json([
                'message' => 'success',
                'data'    => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'data'    => $e,
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
