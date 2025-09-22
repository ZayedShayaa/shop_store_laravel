{{-- @if (session('success'))
<div style="margin: 0 30px;"
    class=" message-div alert text-success fw-500 fs-18 bg-success-light px-30 py-20 alert-dismissible fade show"
    role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif --}}
@if (session('success'))
    <div style="margin: 0 30px; position: relative;"
        class="message-div alert text-success fw-500 fs-18 bg-success-light px-30 py-20" role="alert">
        <button type="button" style="left: 10px; right: auto; position: absolute; top: 50%; transform: translateY(-50%);"
            class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div style="margin: 0 30px;"
        class=" message-div alert text-danger fw-500 fs-18 bg-danger-light px-30 py-20 alert-dismissible fade show"
        role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@section('scripts')
    <script>
        setTimeout(function () {
            $('.message-div').fadeOut('slow');
        }, 3000);
    </script>
@endsection