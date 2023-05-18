@extends('layouts.app')

@section('title', 'EDIT')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 300px;margin-top: 30px">
            <div class="col-md-10">
                <a class="btn btn-outline-primary" href="{{ route('apps.index') }}">{{ __('messages.Index') }}</a>
                <form action="{{ route('apps.update', $app->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group w-50">
                        <label for="titleInput">Name</label>
                        <input type="text" value="{{$app->name}}" class="form-control" id="nameInput" name="name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="titleInput">NameKZ</label>
                        <input type="text" value="{{$app->name_kz}}" class="form-control" id="nameInput" name="name_kz">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="titleInput">NameRU</label>
                        <input type="text" value="{{$app->name_ru}}" class="form-control" id="nameInput" name="name_ru">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="titleInput">NameEN</label>
                        <input type="text" value="{{$app->name_en}}" class="form-control" id="nameInput" name="name_en">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="contentGroup">Price</label>
                        <input type="number" value="{{$app->price}}" class="form-control" id="priceInput" name="price">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="contentGroup">Content</label>
                        <textarea class="form-control" id="contentInput" name="content">{{$app->content}}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group w-50">
                        <label for="contentGroup">ContentKZ</label>
                        <textarea class="form-control" id="contentInput" name="content_kz">{{$app->content_kz}}</textarea>
                        <div class="invalid-feedback"></div>
                    </div> <div class="form-group w-50">
                        <label for="contentGroup">ContentRU</label>
                        <textarea class="form-control" id="contentInput" name="content_ru">{{$app->content_ru}}</textarea>
                        <div class="invalid-feedback"></div>
                    </div> <div class="form-group w-50">
                        <label for="contentGroup">ContentEN</label>
                        <textarea class="form-control" id="contentInput" name="content_en">{{$app->content_en}}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>


                    <div class="form-group mt-3 w-50">
                        <label for="categoryGroup">{{__('messages.Category')}}</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $cat)
                                <option @if($cat->id == $cat->category_id) selected @endif value="{{$cat->id}}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">{{ __('messages.Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
