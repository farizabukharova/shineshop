@extends('layouts.adm')

@section('title', 'CREATE')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 300px;margin-top: 30px">
            <div class="col-md-10">
                <a class="btn btn-outline-primary" href="{{ route('apps.index') }}">{{ __('messages.Index') }}</a>
                <form action="{{ route('apps.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group w-50">
                        <label for="titleInput">{{ __('messages.Name') }}</label>
                        <input type="text" class="form-control" id="nameInput" name="name" placeholder="{{ __('messages.Enter name') }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="titleInput">{{ __('messages.Name') }} KZ</label>
                        <input type="text" class="form-control" id="nameInput" name="name_kz" placeholder="{{ __('messages.Enter name') }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="titleInput">{{ __('messages.Name') }} RU</label>
                        <input type="text" class="form-control" id="nameInput" name="name_ru" placeholder="{{ __('messages.Enter name') }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="titleInput">{{ __('messages.Name') }} EN</label>
                        <input type="text" class="form-control" id="nameInput" name="name_en" placeholder="{{ __('messages.Enter name') }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="priceGroup">{{ __('messages.Price') }}</label>
                        <input type="number" class="form-control" id="priceInput" name="price" placeholder="{{ __('messages.Enter price') }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="descriptionGroup">{{ __('messages.Content') }}</label>
                        <textarea class="form-control" id="contentInput" name="content" placeholder="{{ __('messages.Enter content') }}"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="descriptionGroup">{{ __('messages.Content') }}KZ</label>
                        <textarea class="form-control" id="contentInput" name="content_kz" placeholder="{{ __('messages.Enter content') }}"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="descriptionGroup">{{ __('messages.Content') }}RU</label>
                        <textarea class="form-control" id="contentInput" name="content_ru" placeholder="{{ __('messages.Enter content') }}"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="descriptionGroup">{{ __('messages.Content') }}EN</label>
                        <textarea class="form-control" id="contentInput" name="content_en" placeholder="{{ __('messages.Enter content') }}"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="descriptionGroup">{{ __('messages.Image') }}</label>
                        <input type="file" class="form-control" id="imgInput" name="img" placeholder="Enter">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="categoryGroup">{{ __('messages.Category') }}</label>
                        <select class="form-control" name="category_id" id="categoryGroup">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{ $cat->{'name_'.app()->getLocale()} }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-outline-success" type="submit">{{ __('messages.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
