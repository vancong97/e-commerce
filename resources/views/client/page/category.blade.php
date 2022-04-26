@extends('client.layout.master')
@section('title', trans('message.category'))
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{{ trans('message.category') }} {{ $category->name }}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">{{ trans('message.home') }}</a> / <span>{{ trans('message.category') }}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($categories as $item)
                            @if($item->children->count() > 0)
                                <li class="dropdown">
                                    <a data-toggle="dropdown" href="#">{{ $item->name }}</a>
                                    <ul class="dropdown-menu">
                                        @foreach($item->children as $submenu)
                                            <li><a href="{{ route('category', $submenu->id) }}">{{ $submenu->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>{{ trans('message.newproduct') }}</h4>
                        <div class="beta-products-details">
                            <p class="pull-left"></p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{ route('product.detail', $product->id) }}">
                                                <img class="imageindex" src="{{ asset('storage/images/' . $product->images->first()->image) }}">
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
                        <div class="row col-sm-12">{{ $products->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
