@extends('layouts.admin.app')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    @if (isset($section))
                        <h3>{{__('app.update_section')}}</h3>
                    @else
                        <h3>{{__('app.create_section')}}</h3>

                    @endif

                </div>
                <div class="card-body">



                    @if (isset($section))
                        <form method="POST" class="form" action="{{ route('sections.update', $section) }}">
                            @method('PUT')
                    @else
                            <form method="POST" class="form" action="{{ route('sections.store') }}">
                        @endif
                            @csrf


                            <div class="form-group">
                                <h5>{{__('app.Name')}} <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="@if(isset($section) && old('name') == null){{$section->name}}@else{{old('name')}}@endif"
                                        required autocomplete="name" autofocus>
                                    <div class="help-block"></div>
                                </div>
                                @error('name')
                                    <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                    </div>
                                @enderror
                            </div>
                            <div class="flex items-right justify-end mt-4" style="text-align: right">


                                <button type="submit" class="btn btn-primary">
                                    {{ __('app.save')  }}
                                </button>
                            </div>

                        </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection