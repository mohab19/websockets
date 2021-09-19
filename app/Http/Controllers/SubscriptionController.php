<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\User;

class SubscriptionController extends Controller
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
    public function store(Channel $channel, SubscriptionRequest $request)
    {
        try {
            $user       = User::findOrFail($request->user_id);
            $subscribed = Subscription::where('user_id', $user->id)->where('channel_id', $channel->id)->first();
            if($subscribed) {
                return response()->json([
                    'message' => 'error',
                    'data'    => 'already subscribed!',
                ]);
            }
            $create = Subscription::create([
                'channel_id' => $channel->id,
                'user_id'    => $user->id,
            ]);

            return response()->json([
                'message' => 'success',
                'data'    => $create
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'data'    => $e
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
