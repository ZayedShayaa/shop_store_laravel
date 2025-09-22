@extends('layouts.site.app')

@section('content')
    <main style="min-height: 400px">
        @foreach ($products as $product)


            <div class="product">
                <!-- img -->
                <div class="product_img">
                    <a href="{{route('product_details', $product->id)}}">
                        <img src="{{ asset('uploads/products/' . $product->proimg) }}">
                        <span class="unavailable">{{$product->prounv}}</span>
                    </a>
                </div>
                <!-- section -->
                <div class="product_section">
                    <a href=" {{route('product_details', $product->id)}}">{{$product->section->name}}</a>
                </div>
                <!-- name -->
                <div class="product_name">
                    <a href=" {{route('product_details', $product->id)}}">{{$product->proname}}</a>
                </div>
                <!-- price -->
                <div class="product_price">
                    <a href=" {{route('product_details', $product->id)}}">{{$product->proprice}}&nbsp;السعر</a>
                </div>
                <!-- description -->
                <div class="product_description">
                    <a href=" {{route('product_details', $product->id)}}"><i class="fa-solid fa-eye"></i>تفاصيل المنتج: اضغط
                        هنا</a>
                </div>

                <form action="{{route('cart')}}" method="POST">
                    @csrf
                    <!-- Quantity -->
                    <div class="qty_input">
                        <button type="button" class="decrease-btn">-</button>
                        <input type="number" name="quantity" class="quantity-input" value="1" min="1" max="7">
                        <button type="button" class="increase-btn">+</button>
                    </div>

                    <!-- Hidden Product ID -->
                    <input type="hidden" name="product_id" value="{{$product->id}}">

                    <!-- Submit -->
                    <div class="submit">
                        <button class="add_cart" type="submit" name="add_to_cart">
                            <i class="fa-solid fa-cart-plus">&nbsp; &nbsp;</i>أضف الى السلة
                        </button>
                    </div>
                </form>
            </div>
        @endforeach
    </main>
    <br><br><br><br>
@endsection