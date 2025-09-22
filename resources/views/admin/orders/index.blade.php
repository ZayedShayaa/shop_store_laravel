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
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('app.User')}}</th>
                                    <th>{{__('app.Order_Date')}}</th>
                                    <th>{{__('app.Total_Price')}}</th>
                                    <th>{{__('app.Shipping_Address')}}</th>
                                    <th>{{__('app.City')}}</th>
                                    <th>{{__('app.Phone_Number')}}</th>
                                    <th>{{__('app.Payment_Method')}}</th>
                                    <th>{{__('app.Credit_Card_Type')}}</th>
                                    <th>{{__('app.Zip_Code')}}</th>
                                    <th>{{__('app.Order_Status')}}</th>

                                    <th class="d-action">{{__('app.Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->order_date }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->shipping_address }}</td>
                                        <td>{{ $item->city }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->payment_method }}</td>
                                        <td>{{ $item->credit_card_type }}</td>
                                        <td>{{ $item->zip_code }}</td>
                                        <td>{{ $item->order_status }}</td>

                                        <td class="d-action">
                                            <a href="{{route('orders.show', $item)}}">
                                                <i class="ti-marker-alt"></i>
                                            </a>
                                            <form method="POST" action="{{route('orders.destroy', $item)}}"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('{{ __('app.Confirm_Delete_Order') }}')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn-delete">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>

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