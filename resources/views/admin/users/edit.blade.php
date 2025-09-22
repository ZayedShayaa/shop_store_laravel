@extends('layouts.admin.app')
@section('css')
    @vite(['resources/css/app.css'])
@endsection
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('app.Profile') }}
                </h2>

            </div>
            <div class="card-body">

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection