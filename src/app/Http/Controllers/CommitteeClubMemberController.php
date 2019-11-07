<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Club;
use App\UserClub;
use App\User;
use App\Position;

class CommitteeClubMemberController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($clubid)
    {
        $clubsname = Club::with('users','positions')->find($clubid);

        $users = User::with('positions')->get();

        $clubs = DB::table('club_user')
        ->join('users', 'users.id', '=', 'club_user.user_id')
        ->join('positions', 'positions.id', '=', 'club_user.position_id')
        ->select('positions.*', 'users.*', 'positions.name as position_name','users.name as user_name')
        ->where('club_id', $clubid)
        ->get();

        $findCreate = UserClub::where('club_id', '=', $clubid)->get();

        //dd($clubs);
        $positions = Position::all();

        return view('committee.club.member.index', ['clubs' => $clubs, 'clubid' => $clubid, 'users' => $users, 'clubsname' => $clubsname, 'positions' => $positions, 'findCreate' => $findCreate]);
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
