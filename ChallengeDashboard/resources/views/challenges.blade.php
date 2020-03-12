@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of challenges') }}</div>

                <div class="card-body">
                   
                    <div class="container mt-5">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Deadline</th>
                                {{-- <th scope="col">See Challenge</th> --}}
                                <th scope="col">Participate</th>
                               
                                <th style="display:{{$hidden}}" scope="col">Edit</th>
                                
                                <th scope="col">Delete</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($challenges as $challenge)
                                <tr>
                                    <td>{{ $challenge->title}}</td>
                                    <td>{{ $challenge->deadline }}</td>
                                    {{-- <td><a href="/challenge/{{ $id->id }}/see" class="btn btn-sm btn-success">see {{ $challenge->title}}</a></td> --}}
                                    <td><button class="btn btn-sm btn-success">Participate</button></td>
                                    <td style="display:{{$hidden}}"><button class="btn btn-sm btn-success">Edit</button></td>
                                    <td> <form action="{{ route('challenge.destroy', $challenge->id)}}" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
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
                    {{ $challenges->links() }}       
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
