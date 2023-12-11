@if(session()->has('message'))
    <div class="fixed top-0 bg-red">
        {{session('message')}}
    </div>
@endif
