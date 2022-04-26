@extends('client.layout.master')
@section('title', trans('message.search'))
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide">
                        <div class="slotholder"  data-duration="undefined" data-zoomstart="undefined"
                            data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined"
                            data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined"
                            data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined"
                            data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg banner1" data-lazyload="undefined" data-bgfit="cover"
                                data-bgposition="center center" data-bgrepeat="no-repeat"
                                data-lazydone="undefined" src="{{ config('config.banner1') }}"
                                data-src="{{ config('config.banner1') }}" >
                            </div>
                        </div>
                    </li>
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide">
                        <div class="slotholder"  data-duration="undefined" data-zoomstart="undefined"
                            data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined"
                            data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined"
                            data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined"
                            data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg banner2" data-lazyload="undefined" data-bgfit="cover"
                                data-bgposition="center center" data-bgrepeat="no-repeat"
                                data-lazydone="undefined" src="{{ config('config.banner2') }}"
                                data-src="{{ config('config.banner2') }}" >
                            </div>
                        </div>
                    </li>
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide">
                        <div class="slotholder"  data-duration="undefined" data-zoomstart="undefined"
                            data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined"
                            data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined"
                            data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined"
                            data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg banner3" data-lazyload="undefined" data-bgfit="cover"
                                data-bgposition="center center" data-bgrepeat="no-repeat"
                                data-lazydone="undefined" src="{{ config('config.banner3') }}"
                                data-src="{{ config('config.banner3') }}" >
                            </div>
                        </div>
                    </li>
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide">
                        <div class="slotholder"  data-duration="undefined" data-zoomstart="undefined"
                            data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined"
                            data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined"
                            data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined"
                            data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg banner4" data-lazyload="undefined" data-bgfit="cover"
                                data-bgposition="center center" data-bgrepeat="no-repeat"
                                data-lazydone="undefined" src="{{ config('config.banner4') }}"
                                data-src="{{ config('config.banner4') }}" >
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tp-bannertimer"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>{{ trans('message.search') }}</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">
                                {{ trans('message.content') }}
                                {{ count($products) }}
                                {{ trans('message.contentproduct') }}
                            </p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{ route('product.detail', $product->id) }}">
                                                <img class="imageindex" src="{{ asset('storage/images/' . $product->images->first()->image) }}" >
                                            </a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">
                                                <h4>{{ $product->name }}</h4>
                                            </p>
                                            <div class="">&nbsp;</div>
                                            <p class="single-item-price">
                                                <span class="price">
                                                    {{ number_format($product->price) }}
                                                    {{ trans('message.$') }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="">&nbsp;</div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"
                                                href="{{ route('addcart', $product->id) }}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a class="beta-btn primary"
                                                href="{{ route('product.detail', $product->id) }}">
                                                {{ trans('message.detail') }}
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="space60">&nbsp;</div>
                        <div class="row text-center">{{ $products->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
