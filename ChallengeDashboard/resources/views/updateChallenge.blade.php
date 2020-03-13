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
            <div class="card-header">{{ __('Updated Challenge : ') }}{{$challenge->deadline}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editChallenge', $challenge->id)}}">
                       {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{$challenge->title}}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Challenge Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="textarea"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{$challenge->description}}" required autocomplete="description">
                                    {{$challenge->description}}
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('Challenge Start Date') }}</label>

                            <div class="col-md-6">
                                <input id="start" type="date" class="form-control @error('start') is-invalid @enderror" name="start" required autocomplete="start" value="{{$challenge->start}}">

                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deadline" class="col-md-4 col-form-label text-md-right">{{ __('Challenge Deadline') }}</label>

                            <div class="col-md-6">
                                <input id="deadline" type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" required  value="{{$challenge->deadline}}" >

                                @error('deadline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
