@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of Participants') }}</div>

                <div class="card-body">
                   
                    <div class="container mt-5">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Created Date</th>
                                {{-- <th scope="col">See Challenge</th> --}}
                                
                                <th scope="col">Edit</th>
                                
                                <th scope="col">Delete</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>  <a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a></td></td>
                                    <td> <form action="{{ route('user.destroy', $user)}}" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form></td>
                                </tr>
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
                    {{ $users->links() }}       
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
