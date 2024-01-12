<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$users = User::all();
		return view('admin.home', compact('users'));
    }

	public function show_users()
    {
        $users = User::all();
        return view('admin.users', compact( 'users'));
    }

    public function status_users(Request $request)
    {
        $user_id = $request->get('user_id');
        $status = $request->get('status');
        //$users = User::all();
        $user = User::all()->where('id', $user_id)->first();
        //dd($user->status);

        if ($user->status == $status) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }

        $user->save();
//        dd($user);

        return response()->json(['success'=>$user->status]);

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
