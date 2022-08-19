@if (session('success'))
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        </div>
    </div>
@endif
@if ($errors->count() > 0)
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

