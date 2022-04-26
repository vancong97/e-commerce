<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <form action="{{ route('post.search') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-sm-3">
                        <select class="form-control form-control-lg" name="category">
                            <option selected disabled>Chọn loại sản phẩm</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control form-control-lg" name="madein">
                            <option selected disabled>Chọn nơi sản xuất</option>
                            @foreach($madeins as $madein)
                                <option value="{{ $madein->id }}">{{ $madein->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>{{ trans('message.newproduct') }}</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
