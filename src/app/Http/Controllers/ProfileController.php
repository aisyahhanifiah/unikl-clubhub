<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\User;
use App\UserClub;
use App\UserEvent;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $clubs = UserClub::where('user_id', '=', Auth::user()->id)->get();

        $events = UserEvent::where('user_id', '=', Auth::user()->id)->get();
        //$clubs->count();
        //dd($clubs->count());

        // $image = Image::with('user')->find(1) // Get the image with user eager loading
        // $image->users->count(); // Get the user count
        
        $queryName = User::where('id', Auth::user()->id)->pluck('name')->first(); 
        $queryPhone = User::where('id', Auth::user()->id)->pluck('phone_no')->first(); 
        $queryGender = User::where('id', Auth::user()->id)->pluck('gender')->first(); 
        $queryDOB = User::where('id', Auth::user()->id)->pluck('dob')->first();
        
        //dd($queryUser);

        return view('profile.edit', ['clubs' => $clubs, 'events' => $events, 'queryName' => $queryName, 'queryPhone' => $queryPhone, 'queryGender' => $queryGender, 'queryDOB' => $queryDOB]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
