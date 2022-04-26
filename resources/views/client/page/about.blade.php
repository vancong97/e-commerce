@extends('client.layout.master')
@section('title', trans('header.about'))
@section('content')
    <div class="container">
        <div id="content">
            <div class="our-history">
                <h2 class="text-center wow fadeInDown">{{ trans('header.history') }}</h2>
                <div class="space35">&nbsp;</div>
                <div class="history-slider">
                    <div class="history-navigation">
                        <a data-slide-index="0" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">{{ trans('header.2013') }}</span></a>
                        <a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">{{ trans('header.2014') }}</span></a>
                        <a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">{{ trans('header.2015') }}</span></a>
                        <a data-slide-index="3" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">{{ trans('header.2016') }}</span></a>
                        <a data-slide-index="4" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">{{ trans('header.2017') }}</span></a>
                        <a data-slide-index="5" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">{{ trans('header.2018') }}</span></a>
                        <a data-slide-index="6" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">{{ trans('header.2019') }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
