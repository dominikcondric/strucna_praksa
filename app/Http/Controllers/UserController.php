<?php

namespace App\Http\Controllers;

use App\User;
use Error;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.users', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.user', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'bail|required|email:filter',
            'password' => 'bail|required|string|min:8|max:50',
            'passwordConfirm' => 'required|same:password'
        ]);

        if ($request->email != $user->email && User::where('email', $request->email)->exists()) return redirect("/users/$user->id");
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect("/users/$user->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if (User::count() == 1 || (User::where('admin', 1)->count() == 1 && $user->admin == true)) redirect('/users');
        foreach ($user->tickets as $ticket) {

            foreach ($ticket->assignUsers(User::count()) as $newUser) {
                if (!$newUser->tickets->contains($ticket)) {
                    $ticket->users()->attach($newUser->id);
                break;
                }    
            }
            
            $ticket->users()->detach($user->id);
        }
        $user->delete();

        return redirect('/users');
    }

    public function promote(User $user) {
        $user->update([
            'admin' => 1
        ]);

        return redirect("/users/$user->id");
    }
}
