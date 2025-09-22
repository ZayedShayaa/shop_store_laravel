@extends('layouts.admin.app')

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="col-12">



            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('app.Products') }}</h3>

                    <a href="{{route('products.create')}}" style="text-align: right;float: left;"
                        class="waves-effect waves-light btn mb-5 bg-gradient-primary justify-end">{{ __('app.Add') }}
                    </a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('app.Product_Name')}}</th>
                                    <th>{{__('app.Image')}}</th>
                                    <th>{{__('app.Price')}}</th>
                                    <th>{{__('app.Section')}}</th>
                                    <th>{{__('app.Description')}}</th>
                                    <th>{{__('app.Size')}}</th>
                                    <th>{{__('app.Unit')}}</th>
                                    <th class="d-action">{{__('app.Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->proname }}</td>
                                        <td>
                                            <img style="width: 100px;" src="{{ asset('uploads/products/' . $item->proimg) }}"
                                                style="width=100px;">
                                        </td>
                                        <td>{{ $item->proprice }}</td>
                                        <td>{{ $item->section->name }}</td>
                                        <td>{{ $item->prodescription }}</td>
                                        <td>{{ $item->prosize }}</td>
                                        <td>{{ $item->prounv }}</td>
                                        <td class="d-action">
                                            <a href="{{route('products.edit', $item)}}">
                                                <i class="ti-marker-alt"></i>
                                            </a>
                                            <form method="POST" action="{{route('products.destroy', $item)}}"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('{{ __('app.Confirm_Delete_Product') }}')">
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