@extends('layouts.app')
ү
@section('title', 'Cart')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <a class="btn btn-outline-primary" href="{{ route('apps.index') }}">{{ __('messages.Index') }}</a>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('/storage/avatars/'.$profile->image) }}" alt="avatar"
                                 class="rounded-circle img-fluid">
                            <h5 class="my-3">{{Auth::user()->name}}</h5>
                            <div class="d-flex justify-content-center mb-2">
                                <a type="submit" class="btn btn-primary" href="{{route('profile.edit', Auth::user()->id)}}">{{__('messages.Edit')}}</a>
{{--                                <form action="{{route('profile.destroy', Auth::user()->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                   @method('DELETE')--}}
{{--                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger ms-1">{{__('messages.Delete')}}</button>--}}
{{--                                </form>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{__('messages.Name')}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{Auth::user()->name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{__('messages.Email')}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
