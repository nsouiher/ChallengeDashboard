<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Http\Controllers\Controller;
use App\Notifications\NewGuest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Redirect;

class manageUsers extends Controller
{
    //
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public $users;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
 
  /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new challenge instance 
     *
     * @param  array  $data
     * @return \App\User
     */
    public function show()
    {

        error_log("heloooooooo");

        $users = User::orderBy('created_at', 'asc')->paginate(5);
        error_log($users);
        return view('manageUsers')->with('users', $users)->with('hidden', 'none')->withTitle('user');
    }
    public function edit($id)
    {

        $user=User::where('id', $id)->first();
        $auths=["Admin","Organizer","Participant"];

        return view('layouts.updateUser')->with('user',$user)->with('auths',$auths)
            ->with('success', 'Great! User updated successfully');
        // $where = array('id' => $id);
        // $data['user_info'] = User::where($where)->first();

        // return view('user.Edit', $data);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'auth' => 'required'
        ]);

        $updatedUser = ['name' => $request->name, 'email' => $request->email, 'password' =>Hash::make($request->password), 'auth' => $request->type];
        User::where('id', $id)->update($updatedUser);

        return Redirect::to('manageUsers')
            ->with('success', 'Great! User updated successfully');
    }
    public function destroy($id)
    {
        error_log('destroy');
        User::where('id', $id)->delete();
        return Redirect::to('manageUsers')->with('success', 'User has been deleted Successfully');
    }
}
