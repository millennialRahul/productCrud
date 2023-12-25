@if($errors->count())
    <div class="m-portlet">
        <div class="alert alert-danger">
            <div class=""><strong>Errors:</strong></div>
            @foreach($errors->all() as $error)
                <span style="display: inline-block;width: 100%;"> {{ $error }} </span>
            @endforeach
        </div>
    </div><!--end of notification-->
@endif


