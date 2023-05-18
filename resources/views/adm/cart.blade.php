@extends('layouts.adm')

@section('title', 'Cart')

@section('content')

    <h1>Users</h1>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.Name')}}</th>
            <th scope="col">{{__('messages.User')}}</th>
            <th scope="col">{{__('messages.Number')}}</th>
            <th scope="col">{{__('messages.status')}}</th>
            <th scope="col">{{__('messages.confirm')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($cart); $i++)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$cart[$i]->app->name}}</td>
                <td>{{$cart[$i]->user->name}}</td>
                <td>{{$cart[$i]->number}}</td>
                <td>{{$cart[$i]->status}}</td>
                <td>
                    <form action="{{route('adm.cart.confirm', $cart[$i]->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success" type="submit">{{__('messages.confirm')}}</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
