@extends('layouts.site.app')
@section('css')
   


@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="box box-body b-1 text-center no-shadow">
                                <img src="{{asset('uploads/products/' . $product->proimg)}}" id="product-image"
                                    class="img-fluid" alt="">
                            </div>
                            {{-- <div class="pro-photos">
                                <div class="photos-item">
                                    <img src="{{asset('uploads/products/' . $product->proimg)}}" alt="">
                                </div>
                                <div class="photos-item">
                                    <img src="{{asset('uploads/products/' . $product->proimg)}}" alt="">
                                </div>
                                <div class="photos-item">
                                    <img src="{{asset('uploads/products/' . $product->proimg)}}" alt="">
                                </div>
                                <div class="photos-item item-active">
                                    <img src="{{asset('uploads/products/' . $product->proimg)}}" alt="">
                                </div>
                            </div> --}}
                            <div class="clear"></div>
                        </div>
                        <div class="col-md-8 col-sm-6">
                            <h2 class="box-title mt-0">{{$product->proname}}</h2>
                            <div class="list-inline">
                                <a class="text-warning"><i class="mdi mdi-star"></i></a>
                                <a class="text-warning"><i class="mdi mdi-star"></i></a>
                                <a class="text-warning"><i class="mdi mdi-star"></i></a>
                                <a class="text-warning"><i class="mdi mdi-star"></i></a>
                                <a class="text-warning"><i class="mdi mdi-star"></i></a>
                            </div>
                            <h1 class="pro-price mb-0 mt-20">${{$product->proprice}}
                                <span class="old-price">${{$product->oldprice}}</span>
                                <span class="text-danger">{{$product->discount}}% off</span>
                            </h1>
                            <hr>
                            <p>{{$product->prodescription}}</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6>Color</h6>
                                    <div class="input-group">
                                        <ul class="icolors">
                                            <li class="bg-danger rounded-circle"></li>
                                            <li class="bg-info rounded-circle"></li>
                                            <li class="bg-primary rounded-circle active"></li>
                                        </ul>
                                    </div>
                                    <h6 class="mt-20">Available Size</h6>
                                    <p class="mb-0">
                                        <span
                                            class="badge badge-pill badge-lg badge-secondary-light">{{$product->prosize}}</span>

                                    </p>
                                </div>
                            </div>
                            <hr>
                            <form action="{{route('cart')}}" method="POST">
                                @csrf
                                <!-- Quantity -->

                                <div class="qty_input">

                                    <button type="button" class="decrease-btn">-</button>

                                    <input type="number" name="quantity" class="quantity-input" value="1" min="1" max="7">

                                    <button type="button" class="increase-btn">+</button>

                                </div><br>

                                <!-- Quantity -->



                                <!-- submit -->

                                <div class="submit">

                                    <input type="hidden" name="product_id" value="{{$product->id}}">



                                </div>

                                <div class="gap-items">
                                    <button class="btn btn-success"><i class="mdi mdi-shopping"></i> Buy Now!</button>
                                    <button type="submit" name="add_to_cart" class="  btn btn-primary"><i
                                            class="mdi mdi-cart-plus"></i> Add To Cart</button>


                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection