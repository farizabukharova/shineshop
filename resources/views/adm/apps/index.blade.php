@extends('layouts.app')

@section('title', 'INDEX')

@section('content')
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>{{__('messages.our_pro')}}</h2>
            </div>
            <div class="row">
                @foreach($apps as $arp)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <span class="badge badge-primary badge-pill">
                                    <a href="{{ route('apps.show',$arp->id) }}" class="flex-sm-row btn btn-primary">
                                        {{ __('messages.Show') }}
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{asset($arp->img)}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$arp->{'name_'.app()->getLocale()} }}
                            </h5>
                            <h6>
                                {{__('messages.Price')}}
                                {{$arp->price}}
                                KZT
                            </h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

