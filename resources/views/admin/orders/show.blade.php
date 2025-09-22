@extends('layouts.admin.app')

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="col-12">



            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('app.Orders') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('app.Product_Image') }}</th>
                                    <th>{{ __('app.Product_Name') }}</th>
                                    <th>{{ __('app.Price') }}</th>
                                    <th>{{ __('app.Quantity') }}</th>
                                    <th>{{ __('app.Total_Price') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $total_price = 0; @endphp

                                @foreach ($order->items as $item)

                                    @php $subtotal = $item->product->proprice * $item->quantity;@endphp

                                    @php $total_price += $subtotal;@endphp


                                    <td><img src="{{ asset('uploads/products/' . $item->product->proimg) }}" alt="{{ __('app.Product') }}"
                                            width="50"></td>

                                    <td>{{$item->product->proname}}</td>
                                    <td>{{$item->product->proprice}} &nbsp;</td>
                                    <td>{{$item->quantity}}</td>
                                    <td class="total">{{ number_format($subtotal, 2)}} &nbsp;</td>




                                    </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->

@endsection