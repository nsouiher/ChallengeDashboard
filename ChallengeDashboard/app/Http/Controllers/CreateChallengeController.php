<?php

namespace App\Http\Controllers\Auth;

use App\Challenge;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;

class CreateChallengeController extends Controller
{
   
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string','max:255'],
            'deadline' => ['required', 'date', 'confirmed'],
        ]);
    }

    /**
     * Create a new challenge instance 
     *
     * @param  array  $data
     * @return \App\User
     */
    public function store(Request $data)
    {
        error_log($data);
        $challenge = new Challenge();
        $challenge->title = $data->name;
        $challenge->description = $data->description;
        $challenge->deadline = $data->deadline;
        $challenge->auth = 'open';
        $challenge->save();
       
    }
    // s
}
