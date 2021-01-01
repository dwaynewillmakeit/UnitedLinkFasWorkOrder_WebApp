@if (session('success'))
    <div class="alert alert-success" role="alert">
       <p> {{ session('success') }}</p>
    </div>
@endif
@if (session('failed'))
    <div class="alert alert-danger" role="alert">
       <p>{{ session('failed') }}</p> 

    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li class="white-text ">*{{ $error }}</li>
        @endforeach
    </div>
@endif