@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Guests are waiting for approve!') }}</div>

                <div class="card-body">
                   
                    <div class="container mt-5">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Register Date</th>
                                {{-- <th scope="col">See Challenge</th> --}}
                                <th scope="col">Approve Guest</th>
                              
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guestsList as $user)
                                <tr>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->created_at }}</td>
                                    {{-- <td><a href="/challenge/{{ $id->id }}/see" class="btn btn-sm btn-success">see {{ $challenge->title}}</a></td> --}}
                                    
                                    <td> <form action="{{ route('approve', $user->id)}}" method="post">
                                        {{ csrf_field() }}
                                       
                                        <button class="btn btn-success" type="submit">Approve</button>
                                    </form></td>
                                   
                                      
                                </tr>
                             
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
                    {{-- {{ $guestsList->links() }}        --}}
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
