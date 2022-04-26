@extends('client.layout.master')
@section('title', trans('message.detail'))
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{{ trans('message.product') }}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('index') }}">{{ trans('message.home') }}</a> /
                <span>{{ trans('message.product') }}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ asset('storage/images/'.$product->images->first()->image) }}">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">
                                <h3>{{ $product->name }}</h3>
                            </p>
                            <div class="space10">&nbsp;</div>
                            @for ($i = config('config.zero'); $i < $tbrate; $i++)
                                <i class="fa fa-star checked" aria-hidden="true"></i>
                            @endfor
                            <div class="space10">&nbsp;</div>
                            <span>
                                @if ($product->status == config('config.one'))
                                    {{ trans('message.trueProduct') }}
                                @else
                                    {{ trans('message.falseProduct') }}
                                @endif
                            </span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="space10">&nbsp;</div>
                        <span class="single-item-price price">
                            {{ number_format($product->price) }}
                            {{ trans('message.$') }}
                        </span>
                        <div class="space10">&nbsp;</div>
                        <div class="single-item-options">
                            <div class="space10">&nbsp;</div>
                            <input id="quantity" type="number" min="1"  max="100" value="{{ config('config.one') }}">
                            <a class="add-to-cart" id="add_cart"
                                data-id="{{ $product->id }}">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <form id="rate" method="POST" action="{{ route('rate', $product->id) }}" >
                            @csrf
                            <ul class="rate-area">
                                <input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" ></label>
                                <input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" ></label>
                                <input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" ></label>
                                <input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" ></label>
                                <input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" ></label>
                            </ul>
                            <input class="btn btn-primary" type="submit" value="{{ trans('message.reviews') }}">
                        </form>
                    </div>
                </div>
                <div class="space20">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li>
                            <a href="#tab-description">{{ trans('message.description') }}</a>
                        </li>
                        <li>
                            <a href="#tab-reviews">{{ trans('message.reviews') }}</a>
                        </li>
                        <li>
                            <a href="#tab-comments">{{ trans('message.comments') }}</a>
                        </li>
                    </ul>
                    <div class="panel" id="tab-description">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>
                            @foreach ($rates as $rate)
                                {{ $rate->user['name'] }}
                                @for ($i = config('config.zero'); $i < $rate->rating; $i++)
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                @endfor
                                </br>
                            @endforeach
                        </p>
                    </div>
                    <div class="panel" id="tab-comments">
                        <p>
                            @foreach ($comments as $comment)
                                <p>{{ $comment->user['name'] }}</p>
                                <p>{{ $comment->content }}</p>
                                <p>{{ $comment->created_at}}</p>
                                </br>
                            @endforeach
                        </p>
                        <p>
                            <form action="{{ route('comment', $product->id) }}" method="POST">
                                {{ csrf_field() }}
                                <textarea name="content" rows="4"></textarea>
                                <button type="submit" class="btn btn-primary">{{ trans('message.comments') }}
                                </button>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">{{ trans('message.similar') }}</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($productSimilars as $productSimilar)
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{ route('product.detail', $productSimilar->id) }}">
                                        <img src="{{ asset('storage/images/'.$productSimilar->images->first()->image) }}">
                                    </a>
                                    <div class="media-body">
                                        <p>{{ $productSimilar->name }}</p>
                                        <div class="space10">&nbsp;</div>
                                        <span class="beta-sales-price">
                                            {{ number_format($productSimilar->price) }}
                                            {{ trans('message.$') }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
