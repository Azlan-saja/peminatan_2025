@if ($errors->any())

<div class="alert alert-danger alert-dismissible" role="alert">

    <div class="d-flex">
        <h4 class="alert-heading">Gagal</h4>
        <div class="alert-description">
            <ul class="alert-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
</div>

@endif