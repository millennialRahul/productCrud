<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>  @section('title') @show Dashboard </title>
    <!--end::Web font -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <!--begin::Base Styles -->
    <link href="{{ asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Base Styles -->

@yield('page_styles')

</head>


<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile
    m-aside-left--enabled m-aside-left--skin-light m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- Main Container -->
<div class="m-grid m-grid--hor m-grid--root m-page">


    @yield('header')



    @yield('sidebar')


    @yield('content')



    @yield('footer')

</div>
<!-- End Container -->

<!-- Message Modal -->
<div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                    <div class="m-messenger__messages">
                        <div class="m-messenger__wrapper" id="message-wrapper"
                             style="height: 500px; overflow-y: auto">

                        </div>
                    </div>
                    <div class="m-messenger__seperator"></div>
                    <div class="m-messenger__form" id="enquiry-message-form">
                        <div class="m-messenger__form-controls">
                            <input type="text" id="enquiry-message" name="message" placeholder="Type here..."
                                   class="m-messenger__form-input">
                        </div>
                        <div class="m-messenger__form-tools">
                            <a href="javascript:;" class="m-messenger__form-attachment send-message">
                                <i class="la la-send-o"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
                {{--<button type="button" class="btn btn-primary">
                    Send message
                </button>--}}
            </div>
        </div>
    </div>
</div>


<!-- End Message -->

<script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/custom/jquery-ui/jquery-ui.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    var url = window.location;
    // Will only work if string in href matches with location
    $('ul.m-menu__nav a[href="' + url + '"]').parent().addClass('m-menu__item--active');

    // Will also work for relative and absolute hrefs
    $('ul.m-menu__nav a').filter(function () {
        return this.href == url;
    }).parent().addClass('m-menu__item--active');
</script>

@yield('page_scripts')

</body>
</html>