@extends('layouts.app')

@section('title', 'CART')

@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 7rem;">
        <div class="row">
            @if($cart != null)
                <form action="{{route('cart.buy')}}" method="post">
                    <a class="btn btn-outline-primary" href="{{ route('apps.index') }}">{{ __('messages.Index') }}</a>
                    @csrf
                    <button type="submit" class="btn btn-primary">{{__('messages.Buy')}}</button>
                </form>
            @endif
            @foreach($cart as $cartt)
                <div class="card mt-3 col-lg-3 m-lg-3" style="background: white">
                    <div class="card-header" style="background: white">
                        <div class="card-body">
                            <img src="{{asset($cartt->img)}}" class="card-img-top" alt="" style="margin: fill; width: 230px; height: 200px;">
                            <h5 class="card-title">{{ $cartt->description }}</h5>
                            <p class="card-text">{{ $cartt->price }} KZT</p>
                            <p class="card-text"> {{ $cartt->pivot->number }} </p>
                            <form class="form-check" action="{{route('apps.uncart', $cartt->id)}}" method="post" style="margin-left: 37px; margin-top: -38px">
                                @csrf
                                <button style="margin-top: 0px; margin-left: 20px" class="btn btn-outline-danger" type="submit">{{ __('messages.Delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
