<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Club;
use App\UserClub;
use App\User;
use App\Meeting;
use App\UserMeeting;

class UserClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('clubs')->find(Auth::user()->id);

        $meetings = Meeting::orderBy('datetime', 'DESC')->get();

        $userMeeting = UserMeeting::all();
        //dd($userMeeting);

        //$checkUser = UserClub::where('club_id', '=', $id)->where('user_id', '=', Auth::user()->id)->count();

        //usermeet/totalmeet*100
        // $totalMeet = $meetings->where('club_id', '=', $club->id)->count();
        // $meet = $meetings->where('club_id', '=', $club->id)->get();
        // $userMeet = $userMeeting->where('meeting_id', '=', $meet->id)->count();

        return view('userclubs.index', ['users' => $users, 'meetings' => $meetings, 'userMeeting' => $userMeeting]);
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


    public function join(Request $request, UserClub $model)
    {
        $model->create($request->all());

        return redirect()->back()->withStatus(__('You have successfully joined the club.'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
