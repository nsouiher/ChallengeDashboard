@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div >
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
            
            {{ Session::get('success') }}
            <a class="alert alert-success" href="/challenges">Jump to challenges</a>
        </div>
       
           @endif
            
          
           <div style="width: 1200px">
            
            <div class="card  card-tasks">
                <div class="card-header ">
                    <h4 style="color: darkcyan" class="card-title">{{$challenge->title}}</h4>
                    <p class="card-category">Organizer</p>
                    <br>
                    <div style="background-color:white; height: 100px; ">
                        <p>{{$challenge->description}}</p>
                    </div>
                   
                </div>
                <div class="card-body ">
                    <form action="{{ route('comment',['idUser'=>$connectedUser->id,'idChallenge'=> $challenge->id])}}" method="post">
                        {{ csrf_field() }}
                        <div class="table-full-width">
                        <table class="table">
                            <tbody>
                                @foreach ($comments as $comment)
                                <tr>
                                   
                                    <td>{{$comment->content}}</td>
                                    <td class="td-actions text-right">
                                        <div >
                                            <a class="fa fa-edit">{{$comment->nameUser}}</a>
                                        </div>
                                       
                                    </td>
                                </tr>
                                @endforeach   
                                
                            </tbody>
                        </table>
                    
                </div>
                        <div style=" " class="card-footer ">
                            <hr>
                            <label>Leave Comment</label>
                            <textarea  style="width: 1000 px; height: 70px" id="comment" type="textarea"  class="form-control @error('description') is-invalid @enderror" name="comment" required autocomplete="comment">
                            
                            </textarea>
                            <br>
                            <div class="stats">
                                <td> 
                                    <button class="btn btn-success" type="submit" data-toggle="modal">comment</button>
                            </td>
                            </div>
                        </div>
            </form>
            </div>
       
        </div>
        
    </div>
</div>

@endsection
