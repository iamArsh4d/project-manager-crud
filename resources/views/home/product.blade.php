<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active h1" data-filter="*">Products</li>
                    <!-- <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li> -->
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @foreach ($product as $products)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="product/product-1.jpg"
                            style="background-image : url('product/{{$products->image}}');">
                            <!-- <img src="img/product/product-1.jpg" alt=""> -->
                            <span class="label">{{$products->category}}</span>
                            <!-- <span class="label">{{$products->description}}</span> -->
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$products->title}}</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="row ml-1">
                                <h5 style="text-decoration : line-through;" class="text-danger">₹{{$products->price}} </h5>
                                <h5 class="ml-2">₹{{$products->discount_price}}/-</h5>
                            </div>
                            <div class="product__color__select">
                                <label for="pc-1">
                                    <input type="radio" id="pc-1">
                                </label>
                                <label class="active black" for="pc-2">
                                    <input type="radio" id="pc-2">
                                </label>
                                <label class="grey" for="pc-3">
                                    <input type="radio" id="pc-3">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {!!$product->withQueryString()->links('pagination::bootstrap-4')!!}
        </div>
    </div>
</section>