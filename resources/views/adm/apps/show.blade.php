@extends('layouts.app')

@section('title', 'SHOW ')

@section('content')
    <div class="card" style="width: 800px; margin-left: 400px">
        <img src="{{asset($app->img)}}" class="card-img-top" alt="..." style="width: 200px; height: 200px">
        <div class="card-body">
            <h5 class="card-title">{{ __('messages.Name') }}: {{$app->{'name_'.app()->getLocale()} }}</h5>
            <h6 class="card-title">{{ __('messages.Price') }}: {{$app->price}} KZT</h6>
            <p class="card-text">{{ __('messages.Content') }}: {{$app->content}} {{$app->{'content_'.app()->getLocale()} }}</p>
            <form action="{{route('apps.cart', $app->id)}}" method="post" style="margin-top: 20px">
                @csrf
                <input type="number" name="number" placeholder="1" style="width: 70px; height: 35px; color: blue">
                <button type="submit" class="btn btn-outline-success">{{ __('messages.Add to Cart') }}</button>
            </form>
        </div>
    </div>
    <form style="margin-top: 10px; margin-left: 400px;" action="{{route('comments.store')}}" method="post">
        @csrf
        <label>
            <textarea style="width: 600px;" name="content" placeholder="Enter comment"></textarea>
        </label>
        <input type="hidden" name="app_id" value="{{$app->id}}">
        <button style="margin-left: 20px; margin-top: -80px" type="submit" class="btn btn-success">{{ __('messages.Save') }}</button>
    </form>
    <ul class="list-group mt-3">
        @foreach($app->comments as $comment)
            <li class="list-group-item d-flex justify-content-between align-items-start" style="width: 600px; margin-left: 400px">
                <small>author: <span style="color: #1a202c; font-size: 16px;">{{$comment->user->name}}</span></small>
                <p>{{$comment->content}}</p>
                @can('delete', $comment)
                    <form action="{{route('comments.destroy', $comment->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('messages.Delete') }}</button>
                    </form>
                @endcan
            </li>
            <hr>
        @endforeach
    </ul>
@endsection
