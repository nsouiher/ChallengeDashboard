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
                                    {{-- <td><a href="/challenge/{{ $id->id }}/see" class="btn btn-sm btn-success">see {{ $challenge->title}}</a></td> --}}
                                    
                                   
                                    <td>  <a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a></td></td>
                                    <td> <form action="{{ route('user.destroy', $user)}}" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form></td>
                                    <td>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#centralModalDanger">modal</button>
                                    </td>
                                      
                                </tr>
                               <!-- Central Modal Medium Warning -->
            <div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <p class="heading lead">Delete Challenge</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <div class="text-center">
                        {{-- <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i> --}}
                        <p> Are you sure you want to delete this challenge , Admin ?</p>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No</a>
                        <form  action="{{route('deleteChallenge',$user->id)}}" id="delete-form-{{$user->id }}" method="POST">
                                {{ csrf_field() }}
                                    @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        {{-- <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Yes, Delete</a> --}}
                    </div>
                </div>
                <!--/.Content-->
            </div>
            
            <!-- Central Modal Medium Warning-->
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
