@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
            
            {{ Session::get('success') }}
            <a class="alert alert-success" href="/challenges">Jump to challenges</a>
        </div>
       
           @endif
            
            <div class="card">
                <div style="background-color: #20B2AA" class="card-header">{{ __('Submit participation Code of :') }} </div>

                <div class="card-body">
                    <form method="POST" action="{{route('submitCode',['idUser'=>$participation->user_id,'idChallenge'=> $participation->challenge_id])}}">
                       {{ csrf_field() }}
                       <div class="alert alert-danger">Code can be submitted only Once!!</div>
                       <div  >
                           <label for="code" >{{ __('Participation Code') }}</label>
                          
                               <textarea style="height: 400px;" id="code" type="textarea" placeholder="Participation Code" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}"  autocomplete="description">
                               </textarea>
                       </div>
                   

                   <!--Footer-->
                   <div class="modal-footer justify-content-center">
                      
                       <a href="/challenges" >
                           <button class="btn btn-danger" >Later</button>
                       </a>
                       <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <input  type="submit" class="btn btn-primary" value="Submit"/>
                               
                        </div>
                    </div>
                     
                   </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
