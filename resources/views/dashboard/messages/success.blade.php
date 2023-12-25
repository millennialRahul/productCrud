@if(session()->has('success'))
    <div class="m-portlet">
        <div class="alert alert-success ">
            @foreach(session()->get('success') as $message)
                <span style="display: block;">{{ $message }}</span>
            @endforeach
        </div>
    </div>
@endif


