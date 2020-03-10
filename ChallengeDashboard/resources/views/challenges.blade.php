@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of challenges') }}</div>

                <div class="card-body">
                   
                    @foreach ($challenges as $challenge)
                    <li>{{ $challenge->title }}</li>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
