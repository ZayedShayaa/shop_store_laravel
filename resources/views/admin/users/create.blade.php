@extends('layouts.admin.app')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (isset($user))
                        <h3>{{__('app.update_user')}}</h3>
                    @else
                        <h3>{{__('app.create_user')}}</h3>

                    @endif

                </div>
                <div class="card-body">



                    @if (isset($user))
                        <form method="POST" class="form" action="{{ route('users.update', $user) }}">
                            @method('PUT')
                    @else
                            <form method="POST" class="form" action="{{ route('users.store') }}">
                        @endif
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{__('app.Name')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="@if(isset($user) && old('name') == null){{$user->name}}@else{{old('name')}}@endif"
                                                required autocomplete="name" autofocus>
                                            <div class="help-block"></div>
                                        </div>
                                        @error('name')
                                            <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{__('app.Email')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="email" name="email" class="form-control"
                                                value="@if(isset($user) && old('email') == null){{$user->email}}@else{{old('email')}}@endif"
                                                required autocomplete="email" autofocus>
                                            <div class="help-block"></div>
                                        </div>
                                        @error('email')
                                            <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{__('app.Phone')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="phone" name="phone" class="form-control"
                                                value="@if(isset($user) && old('phone') == null){{$user->phone}}@else{{old('phone')}}@endif"
                                                autocomplete="phone" autofocus>
                                            <div class="help-block"></div>
                                        </div>
                                        @error('phone')
                                            <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{__('app.Address')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="address" name="address" class="form-control"
                                                value="@if(isset($user) && old('address') == null){{$user->address}}@else{{old('address')}}@endif"
                                                autocomplete="address" autofocus>
                                            <div class="help-block"></div>
                                        </div>
                                        @error('address')
                                            <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{__('app.password')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password" name="password" class="form-control">
                                            <div class="help-block"></div>
                                        </div>
                                        @error('password')
                                            <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{__('app.Confirm_Password')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                class="form-control" autocomplete="password_confirmation" autofocus>
                                            <div class="help-block"></div>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="radio-list">
                                            <label class="radio-inline p-0 me-10">
                                                <div class="radio radio-info">
                                                    <input type="radio" name="is_admin" id="radio1" value="1"
                                                        onclick="event.preventDefault()" onmousedown="return false;"
                                                        onselectstart="return false;">
                                                    <label for="radio1">{{ __('app.Admin') }}</label>
                                                </div>
                                            </label>
                                        </div>
                                        @error('is_admin')
                                            <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
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