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
                <div class="card-header">{{ __('Create New Challenge') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('saveChallenge') }}">
                       {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

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
                                <textarea style="height: 300px" id="description" type="textarea" placeholder="challenge description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">
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
                                <input id="start" type="date" class="form-control @error('start') is-invalid @enderror" name="start" required autocomplete="start">

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
                                <input id="deadline" type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" required autocomplete="deadline">

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
                                    {{ __('Add') }}
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
