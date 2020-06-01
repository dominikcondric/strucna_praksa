<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
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
        if(\App\User::$loggedIn['id'] == 0) return redirect('/welcome');

        return view('tickets.tickets', [
            'tickets' => Ticket::all()
        ]);
    }

    /**
     * Search for requested items storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function search(Request $request) {
        if(\App\User::$loggedIn['id'] == 0) return redirect('/welcome');
        
        if (!$request) {
            return redirect('/tickets');
        }  

        return view('tickets.tickets', [
            'tickets' => Ticket::where("$request->field", $request->search)->get()
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
        return view('tickets/create');
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
            'email' => 'bail|nullable|email:filter',
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

        $ticket->users()->attach($ticket->assignUser());

        return redirect('/tickets');
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
        
        if ($request->exists('state')) {
            $ticket->update([
                'state_id' => $request->state
            ]);
            return redirect("/tickets");
        }
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contactNum' => 'required|max:20|min:5|regex:/^[0-9]+$/',
            'email' => 'bail|nullable|email:filter',
            'description' => 'required|max:100|min:5'
            ]);
            
            $ticket->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contactNum' => $request->contactNum,
                'email' => $request->email,
                'description' => $request->description,
            ]);
                
        return redirect("/tickets/$ticket->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect('/tickets');
    }
}
