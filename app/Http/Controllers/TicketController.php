<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\App\User::$loggedIn == "Login") return redirect('/welcome');
        return view('tickets.tickets', [
            'tickets' => Ticket::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\App\User::$loggedIn == "Login") return redirect('/welcome');
        return view('tickets/create', [
            'message' => null
        ]);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'contactNum' => 'required|max:20|min:5|regex:/^[0-9]+$/',
            // 'email' => 'bail|nullable|regex:^a-zA-z0-9_\.\.+@.+',
            'description' => 'required|max:100|min:5'
        ]);

        $ticket = Ticket::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contactNum' => $request->contactNum,
            'email' => $request->email,
            'description' => $request->description,
            'state_id' => 1
        ]);

        $minTickets = \App\User::first()->tickets()->count();
        $leastTicketsUser = \App\User::first();
        foreach (\App\User::all() as $user) {
            if ($user->tickets()->count() < $minTickets) {
                $minTickets = $user->tickets()->count();
                $leastTicketsUser = $user;
            }
        }

        $ticket->users()->attach($leastTicketsUser->id);

        return view('tickets.thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        if(\App\User::$loggedIn == "Login") return redirect('/welcome');
        return view('/tickets.ticket', [
            'ticket' => $ticket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        if(\App\User::$loggedIn == "Login") return redirect('/welcome');
        return view('tickets.edit', [
            'ticket' => $ticket
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function search(Request $request) {
        if (Ticket::where("$request->field", $request->search)->exists()) {
            $tickets = Ticket::where("$request->field", $request->search)->get();
            return redirect('/tickets');
        } else {
           return view('/tickets/create', [
                'message' => "That ticket doesn't exist"
           ]);
        }
    }
}
