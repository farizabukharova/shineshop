@extends('layouts.adm')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 250px; margin-top: 90px">
            <div class="col-md-10">
{{--                <a class="btn btn-outline-primary" href="{{ route('adm.category.index') }}">Go to Index Page</a>--}}
                <form action="{{ route('adm.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">NameKZ</label>
                        <input type="text" class="form-control @error('name_kz') is-invalid @enderror" id="nameInput" name="name_kz" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">NameRU</label>
                        <input type="text" class="form-control @error('name_ru') is-invalid @enderror" id="nameInput" name="name_ru" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">NameEN</label>
                        <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="nameInput" name="name_en" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" type="submit">{{ __('messages.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
