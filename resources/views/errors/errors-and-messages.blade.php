@if($errors->all())

<div class="alert alert-danger text-center msg" role="alert">
    @foreach($errors->all() as $message)
    {{ $message }}
    <br>
    @endforeach
</div>

@elseif(session()->has('message'))

<div class="alert alert-danger text-center msg" role="alert">
    {{ session()->get('message') }}
</div>

@elseif(session()->has('error'))

<div class="alert alert-danger text-center msg" role="alert">
    {{ session()->get('error') }}
</div>

@elseif(session()->has('status'))

<div class="alert alert-success text-center msg" role="alert">
    {{ session()->get('status') }}
</div>

@endif
<div style="display: none;" class="alert text-center msg" role="alert"></div>