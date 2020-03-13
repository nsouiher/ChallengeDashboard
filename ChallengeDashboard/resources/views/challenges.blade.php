@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div >
            <div class="card" style="width: 1000px">
                <div class="card-header">{{ __('List of challenges') }}</div>

                <div class="card-body">
                   
                    <div class="container mt-5">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Start</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">See Challenge</th>
                                <th scope="col">Participate</th>
                                @if(Auth::user()->auth=='Organizer' || Auth::user()->auth=='Organizer' )
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($challenges as $challenge)
                                <tr>
                                    <td>{{ $challenge->title}}</td>
                                    <td>{{ $challenge->start}}</td>
                                    <td>{{ $challenge->deadline }}</td>
                                <td><a href="/seeChallenge/{{$challenge->id}}">{{ $challenge->title}}</a></td>
                                    <td> <form action="{{ route('participate',['idUser'=>$connectedUser->id,'idChallenge'=> $challenge->id])}}" method="post">
                                        {{ csrf_field() }}
                                        @method('POST')
                                        <button class="btn btn-success" type="submit" data-toggle="modal">Participate</button>
                                    </form></td>
                                    @if(Auth::user()->auth=='Organizer' || Auth::user()->auth=='Organizer' )
                                    <td> <form action="{{ route('updateChallenge',$challenge->id)}}" method="get">
                                        {{ csrf_field() }}
                                        @method('GET')
                                        <button class="btn btn-success" type="submit" data-toggle="modal">Edit</button>
                                    </form></td>
                                    <td> <form action="{{ route('challenge.destroy', $challenge->id)}}" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form></td>
                                    @endif
                                </tr>
                            
                   
            </div>
            </div>
                                @endforeach   
                              
                            </tbody>
                        </table>
                        @if(!empty(Session::get('success')))
                            <div class="alert alert-success"> {{ Session::get('success') }}</div>
                          
                        @endif
                        @if(!empty(Session::get('error')))
                            <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                        @endif
                    </div>
                    {{ $challenges->links() }}       
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
