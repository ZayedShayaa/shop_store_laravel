@extends('layouts.admin.app')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (isset($product))
                        <h3>{{__('app.update_product')}}</h3>
                    @else
                        <h3>{{__('app.create_product')}}</h3>

                    @endif

                </div>
                <div class="card-body">



                    @if (isset($product))
                        <form method="POST" class="form" enctype="multipart/form-data"
                            action="{{ route('products.update', $product) }}">
                            @method('PUT')
                    @else
                            <form method="POST" enctype="multipart/form-data" class="form"
                                action="{{ route('products.store') }}">
                        @endif
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="box">

                                        <div class="box-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fw-700 fs-16 form-label">{{ __('app.Product_Name') }}</label>
                                                            <input type="text" name="proname" class="form-control"
                                                                placeholder="{{ __('app.Product_Name_Placeholder') }}"
                                                                value="@if(isset($product) && old('proname') == null){{$product->proname}}@else{{old('proname')}}@endif">
                                                            @error('proname')
                                                                <div class="form-control-feedback"><small>
                                                                        <code>{{ $message }}</code> </small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fw-700 fs-16 form-label">{{ __('app.Section') }}</label>
                                                            <select class="form-select" name="section_id"
                                                                value="@if(isset($product) && old('section_id') == null){{$product->section_id}}@else{{old('section_id')}}@endif"
                                                                data-placeholder="{{ __('app.Choose_Category') }}" tabindex="1">
                                                                <option></option>
                                                                @foreach ($sections as $section)
                                                                    <option
                                                                        @if(isset($product) && $product->section_id == $section->id){{'selected'}}
                                                                        @endif value="{{$section->id}}">{{$section->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('section_id')
                                                                <div class="form-control-feedback"><small>
                                                                        <code>{{ $message }}</code> </small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--/row-->

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fw-700 fs-16 form-label">{{ __('app.Price') }}</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="ti-money"></i>
                                                                </div>
                                                                <input type="text" class="form-control" name="proprice"
                                                                    value="@if(isset($product) && old('proprice') == null){{$product->proprice}}@else{{old('proprice')}}@endif"
                                                                    placeholder="{{ __('app.Price_Placeholder') }}">
                                                                @error('proprice')
                                                                    <div class="form-control-feedback"><small>
                                                                            <code>{{ $message }}</code> </small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fw-700 fs-16 form-label">{{ __('app.Size') }}</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="ti-cut"></i>
                                                                </div>
                                                                <input type="text" class="form-control" name="prosize"
                                                                    value="@if(isset($product) && old('prosize') == null){{$product->prosize}}@else {{old('prosize')}}@endif"
                                                                    placeholder="{{ __('app.Size_Placeholder') }}">
                                                                @error('prosize')
                                                                    <div class="form-control-feedback"><small>
                                                                            <code>{{ $message }}</code> </small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="fw-700 fs-16 form-label">{{ __('app.Product_Description') }}</label>
                                                            <textarea class="form-control p-15" name="prodescription"
                                                                rows="4">@if(isset($product) && old('prodescription') == null){{$product->prodescription}}@else {{old('prodescription')}}@endif</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                                <div class="row">

                                                    <!--/span-->
                                                    <div class="col-md-4">
                                                        <h4 class="box-title mt-20">{{ __('app.Upload_Image') }}</h4>
                                                        <div class="product-img text-start">
                                                            @if(isset($product) && $product->proimg)
                                                                <img src="{{ asset('uploads/products/' . $product->proimg) }}" alt="Product Image"
                                                                    style="max-width: 200px; max-height: 200px;"
                                                                    class="img-thumbnail mb-3">
                                                            @else
                                                                <img src="{{ asset('uploads/products/default.png') }}"
                                                                    alt="No Image" style="max-width: 200px; max-height: 200px;"
                                                                    class="img-thumbnail mb-3">
                                                            @endif
                                                            <div class="input-group my-3">
                                                                <label class="input-group-text btn-primary"
                                                                    for="inputGroupFile01">
                                                                    @if(isset($product))
                                                                        {{ __('app.Upload_New_Image') }}
                                                                    @else
                                                                        {{ __('app.Upload_Image') }}
                                                                    @endif
                                                                </label>
                                                                <input type="file" class="form-control" name="proimg"
                                                                    id="inputGroupFile01" accept="image/*">
                                                                @error('proimg')
                                                                    <div class="form-control-feedback"><small>
                                                                            <code>{{ $message }}</code> </small>
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions mt-10">
                                                <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i>
                                                    {{ __('app.Save') }}</button>
                                                <a href="{{route('products.index')}}" type=""
                                                    class="btn btn-danger">{{ __('app.Cancel') }}</a>
                                            </div>
                 
                                         </div>
            </div>
        </div>
        </div>


        </form>
        </div>
        </div>
        </div>
    </section>
    <!-- /.content -->

@endsection