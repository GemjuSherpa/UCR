@extends('layouts.app')

@section('content')
<div class="container">
   <div class="home">
        <!-- Home page -->
        <div class="container">
            <div class="landing d-flex">
                <div class="left">
                    <h1>Your needs</h1>
                    <p class="subtitle">At the Heart</p>
                    <div class="d-flex landing-btn mt-3">
                        @if (!Auth::user())
                            @if (Route::has('register'))
                                <button class="btn btn-light">
                                    <a href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </button>
                                <button class="btn btn-light browse"><a href="{{route('browse')}}">Browse</a></button>
                            @endif
                        @else  
                            <button class="btn btn-light browse"><a href="{{route('browse')}}">Browse</a></button>
                        @endif
                    </div>
                </div>
                <!-- Landing image -->
                <div class="right">
                    <img class="landing-img" src="{{asset('/img/Landing-iMac.webp')}}" alt="landing image">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
