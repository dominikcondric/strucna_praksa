<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/states.states');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'state' => 'required|string'
        ]);

        State::create([
            'state' => $request->input('state')
        ]);

        return redirect('/states');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        return view('states.state', [
            'state' => $state
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $request->validate([
            'state' => 'required|string'
        ]);

        $state->update([
            'state' => $request->input('state')
        ]);

        return redirect('/states');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        \App\Ticket::where('state_id', $state->id)->update([
            'state_id' => 1
        ]);

        $state->delete();

        return redirect('/states');
    }

    public function apply(Request $request) {

        foreach (\App\Ticket::find($request->tickets) as $ticket) {
            if ($ticket->state->id != $request->state) {
                $ticket->update([
                    'state_id' => $request->state
                ]);
            }
        }

        return redirect('/states');
    }
}
