@extends('client.layout.master')
@section('title', trans('message.home'))
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
@include('client.page.filter')

@endsection
