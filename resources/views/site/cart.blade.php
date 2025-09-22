@extends('layouts.site.app')
@section('css')
    <style>
        body {

            overflow-y: auto;
            /* السماح بالتمرير */

            min-height: 100vh;
            /* يضمن أن الصفحة تأخذ ارتفاع الشاشة بالكامل */

            margin: 0;

            padding: 0;

        }



        .container {

            background-color: #ffffff;

            border-radius: 8px;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

            padding: 20px;

            overflow-y: auto;

            overflow-x: hidden;



        }



        table {

            width: 100%;

            border-collapse: collapse;

        }



        th,

        td {

            padding: 10px;

            text-align: center;

            border: 1px solid #dee2e6;

        }



        th {

            background-color: #f1f1f1;

        }



        .total {

            font-weight: bold;

            color: #007bff;



        }

        .divtotal {

            text-align: end;

            display: block;

        }



        .quantity {

            width: 60px;

        }



        .delete-icon {

            color: red;

            cursor: pointer;

        }



        .confirm-button {

            display: block;

            background-color: #28a745;

            color: white;

            padding: 10px 20px;

            border: none;

            border-radius: 5px;

            cursor: pointer;

            text-align: center;

            margin: 20px auto 0;

            width: 150px;

        }



        .confirm-button:hover {

            background-color: #218838;

        }

        .form-group {
            text-align: right;
        }
    </style>

@endsection
@section('content')
    <div class="container">

        <h1>سلة التسوق</h1>

        <table>

            <thead>

                <tr>
                    <th>صورة المنتج</th>
                    <th>الاسم</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>إجمالي السعر</th>
                    <th>حذف</th>
                </tr>

            </thead>

            <tbody>


                @php $total_price = 0; @endphp

                @foreach ($carts as $item)

                    @php $subtotal = $item->product->proprice * $item->quantity;@endphp

                    @php $total_price += $subtotal;@endphp


                    <td><img src="{{ asset('uploads/products/' . $item->product->proimg) }}" alt="منتج" width="100px"></td>

                    <td>{{$item->product->proname}}</td>
                    <td>{{$item->product->proprice}} &nbsp;</td>
                    <td>{{$item->quantity}}</td>
                    <td class="total">{{ number_format($subtotal, 2)}} &nbsp;</td>
                    <td><a href="{{route('cart.delete', $item->id)}}"><button type="submit" name="delete" value=""
                                class="delete-icon" style="border:none; background:none;">

                                <i class="fas fa-trash"></i>

                            </button></a> </td>



                    </tr>

                @endforeach
                <tr>
                    <td colspan="4">الإجمالي</td>
                    <td>
                        <h3><span class="total">{{number_format($total_price, 2)}} </span></h3>
                    </td>
                    <td></td>

                </tr>
            </tbody>

        </table>
        <form action="{{route('order')}}" method="POST">
            @csrf
            <div class="divtotal" style="padding-bottom: 20px">

                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-700 fs-16 form-label">عنوان الشحن </label>
                                <input required type="text" name="shipping_address" class="form-control"
                                    value="{{Auth()->user()->address}}">
                                @error('shipping_address')
                                    <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-700 fs-16 form-label"> city </label>
                                <input required type="text" name="city" class="form-control" value="">
                                @error('city')
                                    <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                    </div>
                                @enderror
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-700 fs-16 form-label">الرمز البريدي</label>
                                <input type="text" required name="zip_code" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-700 fs-16 form-label">رقم الهاتف </label>
                                <input required type="text" name="phone" class="form-control"
                                    value="{{Auth()->user()->phone}}">
                                @error('phone')
                                    <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                    </div>
                                @enderror
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-700 fs-16 form-label">طريقة الدفع</label>
                                <select name="payment_method" required class="form-select">
                                    <option value="cash_on_delivery">الدفع عند الاستلام</option>
                                    <option value="credit_card">بطاقة ائتمان</option>
                                    <option value="paypal">باي بال</option>
                                </select>
                            </div>
                        </div>



                    </div>
                    <!--/row-->


                </div>


                <input type="hidden" name="total_price" value="{{$total_price}}" />
                <button class="confirm-button" type="submit">تأكيد الطلب</button>







            </div>
        </form>
    </div>

@endsection