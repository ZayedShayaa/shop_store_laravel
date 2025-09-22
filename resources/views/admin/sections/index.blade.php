@extends('layouts.admin.app')

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            {{-- عرض رسائل النجاح --}}


            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('app.Sections') }}</h3>

                    <a href="{{route('sections.create')}}" style="text-align: right;float: left;"
                        class="waves-effect waves-light btn mb-5 bg-gradient-primary justify-end">{{ __('app.Add') }}
                    </a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('app.Name')}}</th>
                                    <th class="d-action">{{__('app.Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td class="d-action">
                                            <a href="{{route('sections.edit', $item)}}" class="">
                                                <i class="ti-marker-alt"></i>
                                            </a>
                                            <form method="POST" action="{{route('sections.destroy', $item)}}"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('{{ __('app.Confirm_Delete_Section') }}')">
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
                            <tfoot>
                                <tr>
                                    <th>{{__('app.Name')}}</th>
                                    <th>{{__('app.Action')}}</th>
                                </tr>
                            </tfoot>
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