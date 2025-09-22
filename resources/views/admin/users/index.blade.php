@extends('layouts.admin.app')

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="col-12">
          


            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('app.Users') }}</h3>

                    <a href="{{route('users.create')}}" style="text-align: right;float: left;"
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
                                    <th>{{__('app.Email')}}</th>
                                    <th>{{__('app.Phone')}}</th>
                                    <th>{{__('app.Address')}}</th>
                                    <th>{{__('app.Admin')}}</th>
                                    <th class="d-action">{{__('app.Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->is_admin }}</td>
                                        <td class="d-action">
                                            @if ($item->id != Auth()->user()->id)


                                                <a href="{{route('users.edit', $item)}}">
                                                    <i class="ti-marker-alt"></i>
                                                </a>
                                                <form method="POST" action="{{route('users.destroy', $item)}}"
                                                    style="display: inline-block;"
                                                    onsubmit="return confirm('{{ __('app.Confirm_Delete_User') }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-delete">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
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