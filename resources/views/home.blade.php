@extends('Layouts.app')
@section('title', 'Home')
@section('content')
    <div class="background col-12" style="min-height: 300px; position: absolute; z-index: -1;"></div>
    <div class="container d-flex items-center" style="min-height: 300px;">
        <div class="m-auto text-center text-white">
            <h4>Order the room now!</h4>
            <a href="{{ Auth::check() ? '#orders' : route('login') }}" class="btn btn-primary">Order Room</a>
        </div>
    </div>
    <div class="container my-2">
        </div>
        @if (Auth::check())
            <div id="orders" class="col-md-8 m-auto my-3">
                @livewire('orders-form')
            </div>
        @endif
    </div>
@endsection
