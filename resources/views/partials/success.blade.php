@if (Session::has('msg'))
    <p class="success-notify">{!! Session::get('msg') !!}</p>
@endif
