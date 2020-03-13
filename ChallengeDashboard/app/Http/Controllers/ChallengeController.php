<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Notifications\NewGuest;
use App\ParticipantChallenge;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Redirect;
use DB;
class ChallengeController extends Controller
{
    //
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public $challenges;
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
            'description' => ['required', 'string', 'max:255'],
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
        $challenge->title = $data->title;
        $challenge->description = $data->description;
        $challenge->deadline = $data->deadline;
        $challenge->start = $data->start;
        $challenge->status = "onGoing";
        $challenge->save();
        return Redirect::to('createChallenge')->with('success', 'Challenge has been created Successfully');
        
    }
    
    /**
     * Create a new challenge instance 
     *
     * @param  array  $data
     * @return \App\User
     */
    public function show()
    {

       
        // $user = User::where('email', auth()->user()->email)->first();
        // print_r(auth()->user()->email);
        $connectedUser = auth()->user();
        $challenges = Challenge::orderBy('deadline', 'asc')->paginate(5);
        error_log($challenges);
        return view('challenges')->with('challenges', $challenges)->with('connectedUser', $connectedUser)->with('hidden', 'none')->withTitle('challenge');;
        // $challenges = \App\Challenge::all();
        // error_log($challenges);

        ///return view('succefullySubmitted');

    }


    public function destroy($id)
    {
        error_log('destroy');
        Challenge::where('id',$id)->delete();
        return Redirect::to('challenges')->with('success', 'Challenge has been deleted Successfully');
    }

    // public function destroy($id)
    // { User::where('id',$id)->delete();
   
    //     return Redirect::to('users')->with('success','User deleted successfully');
    // }
    public function participate($idUser,$idChallenge)
    {

        error_log($idChallenge);
        error_log($idUser);
        $challenge=Challenge::where('id',$idUser)->first();
        $connectedUser = auth()->user();
        $participation = new ParticipantChallenge();
        $participation->user_id = $idUser;
        $participation->challenge_id= $idChallenge;
        $participation->is_Winner=false;
        $participation->save();
      
        return view('submitCode')->with('participation', $participation)->with('success', 'Challenge has been created Successfully');
    }  
    public function submitCode(Request $data,$idUser,$idChallenge)
    {
       error_log("holaaaaaaaaaa");
        $updatedParticipation = ['participant_code' =>$data->code];
        ParticipantChallenge::where('user_id', $idUser)->where('challenge_id', $idChallenge)->update($updatedParticipation);
       // print($updatedUser['auth']);
       
       return Redirect::to('challenges')
       ->with('success', 'you are Participant now in this Challenge, Dont forget to submit code before deadline!',$updatedParticipation);
      
    }
    public function updateChallenge($id)
    {
        error_log("hello from update");
        $challenge = Challenge::where('id', $id)->first();
        return view('updateChallenge')->with('challenge', $challenge);
    }
    public function editChallenge(Request $request, $id)
    {
        
        $updatedChallenge = ['title' => $request->name, 'description' => $request->email,'deadline' => $request->auth,'start' => $request->start];
        Challenge::where('id', $id)->update($updatedChallenge);
      
        return Redirect::to('challenges')
            ->with('success', 'Challenge updated successfully');
    }
    public function create()
    {
        return view('organizer.createChallenge');
    }
    public function seeChallenge($id)
    {
        $connectedUser = auth()->user();
        $challenge = Challenge::where('id', $id)->first();
        $comments = Comment::where('challenge_id', $id)->get();
       
        return view('Challenge')->with('challenge', $challenge)->with('comments', $comments)->with('connectedUser', $connectedUser);
    }

    public function comment(Request $data,$idUser,$idChallenge)
    {
        
        $challenge=Challenge::where('id',$idUser)->first();
        $connectedUser = auth()->user();
        $comment = new Comment();
        $comment->content =$data->comment;
        $comment->challenge_id= $idChallenge;
        $comment->user_id=$connectedUser->id;
        $comment->nameUser=$connectedUser->name;
        $comment->save();
       
        return Redirect::to('challenges');
            
      
    }
    
}
