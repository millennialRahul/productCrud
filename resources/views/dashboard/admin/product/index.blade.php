@extends('dashboard.layouts.master')


@section('header')

    @include('dashboard.layouts.header')

@endsection


@section('title')
    Products - @parent
@endsection

@section('page_styles')
    <link href="//www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .amcharts-chart-div a {
            display: none !important;
        }
    </style>
@endsection

@section('sidebar')

    @include('dashboard.includes.nav-admin')

@endsection


@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Product
                    </h3>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('admin.product.create') }}">Add Product</a>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="m-content">
            <!--Begin::Section-->
            <div class="m-portlet m-portlet--mobilXe m-portlet--tabs ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs  m-tabs-line m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#live" role="tab">
                                    Active
                                </a>

                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#suspended" role="tab">
                                    Inactive
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="live" role="tabpanel">
                        <div class="m-portlet__body">
                            <!--begin: Datatable -->
                            <table style="width: 100%;"
                                   class="table table-striped- table-bordered table-hover table-checkable"
                                   id="active-products">
                                <thead>
                                <tr>
                                    <th>
                                        Date Added
                                    </th>

                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        Price
                                    </th>

                                    <th>
                                        Quantity
                                    </th>

                                    <th>
                                        Category
                                    </th>
                        
                                    <th>
                                        Actions
                                    </th>
                                </tr>

                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="suspended" role="tabpanel">
                        <div class="m-portlet__body">
                            <!--begin: Datatable -->
                            <table style="width: 100%;"
                                   class="table table-striped- table-bordered table-hover table-checkable"
                                   id="inactive-products">
                                <thead>
                                <tr>
                                <th>
                                        Date Added
                                    </th>

                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        Price
                                    </th>

                                    <th>
                                        Quantity
                                    </th>

                                    <th>
                                        Category
                                    </th>
                        
                                    <th>
                                        Actions
                                    </th>
                                </tr>


                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                
                </div>
            </div>

            <!--End::Section-->
        </div>

    </div>


@endsection

@section('footer')

    @include('dashboard.layouts.footer')

@endsection

@section('page_scripts')

    <!--begin::Page Vendors -->
    <script src="{{ asset('assets/js/datatables.bundle.js') }}" type="text/javascript"></script>

    <!--end::Page Vendors -->
    <!--begin::Page Snippets -->
    <script src="{{ asset('assets/js/sweetalert.min.js') }}" type="text/javascript"></script>
    <!--end::Page Snippets -->

    <script type="text/javascript">
        var venuesTables = {
            init: function () {
                var t;

                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
                });


                $("#export_print").on("click", function (e) {
                        e.preventDefault(), t.button(0).trigger()
                    }
                ),

                    $("#export_copy").on("click", function (e) {
                            e.preventDefault(), t.button(1).trigger()
                        }
                    ),

                    $("#export_excel").on("click", function (e) {
                            e.preventDefault(), t.button(2).trigger()
                        }
                    ),

                    $("#export_csv").on("click", function (e) {
                            e.preventDefault(), t.button(3).trigger()
                        }
                    ),

                    $("#export_pdf").on("click", function (e) {
                            e.preventDefault(), t.button(4).trigger()
                        }
                    )
            }
        };

        $(function () {
            venuesTables.init();

            var live = $("#active-products").DataTable({
                serverSide: true,
                processing: true,
                sScrollX: '100%',
                ajax: {
                    url: 'http://127.0.0.1:8000/api/get/products',
                    type: 'POST',
                    data: function (d) {
                        d._token = '{{ csrf_token() }}';
                    }
                },
                columns: [
                    {data: 'date', name: 'date'},
                    {data: 'name', name: 'name'},
                    {data: 'price', name: 'price'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'category', name: 'category'},
                    {data: 'action', name: 'action', searchable: false, sortable: false},
                ],
                order: [],
                responsive: false,
                pageLength: 20,
                aLengthMenu: [[25, 50, 75, -1], [25, 50, 75, "All"]],
                iDisplayLength: 25,
                dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
                buttons: ["print", "copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],

            });

            var suspended = $("#inactive-products").DataTable({
                    serverSide: true,
                    processing: true,
                    sScrollX: '100%',
                    ajax: {
                        url: 'http://127.0.0.1:8000/api/get/products',
                        type: 'POST',
                        data: function (d) {
                            d._token = '{{ csrf_token() }}';
                            d.trash = true;
                        }
                    },
                    columns: [
                        {data: 'date', name: 'date'},
                        {data: 'name', name: 'name'},
                        {data: 'price', name: 'price'},
                        {data: 'quantity', name: 'quantity'},
                        {data: 'category', name: 'category'},
                        {data: 'action', name: 'action', searchable: false, sortable: false},
                    ],
                    responsive: false,
                    pageLength: 20,
                    aLengthMenu: [[25, 50, 75, -1], [25, 50, 75, "All"]],
                    iDisplayLength: 25,
                    dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
                    buttons: ["print", "copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
                }
            );


            $('body').on('click', 'a.delete-btn', function () {
                var _this = $(this);
                swal({
                    text: "Are you sure you want to delete this Product?",
                    icon: "info",
                    buttons: true,

                }).then(willRestore => {
                    if (willRestore) {
                        $.ajax({
                            type: 'POST',
                            url: 'http://127.0.0.1:8000/api/product/trash',
                            data: {'_token': '{{ csrf_token() }}', 'id': $(_this).data('id')},
                            dataType: 'JSON',
                            success: function (data) {
                                if (data.status) {
                                    live.row($(_this).parents('tr'))
                                        .remove()
                                        .draw();
                                    suspended.draw();
                                    swal.close();
                                } else {
                                    swal({
                                        text: data.message,
                                        icon: 'error',
                                    });
                                }
                            },
                            error: function (data) {
                                swal({
                                    text: data.message,
                                    icon: 'error',
                                });
                            }

                        });
                    }
                });
            })


            $('body').on('click', 'a.restore-btn', function () {
                var _this = $(this);
                swal({
                    text: "Are you sure you want to restore this Product?",
                    icon: "info",
                    buttons: true,

                }).then(willRestore => {
                    if (willRestore) {
                        $.ajax({
                            type: 'POST',
                            url: 'http://127.0.0.1:8000/api/product/restore',
                            data: {'_token': '{{ csrf_token() }}', 'id': $(_this).data('id')},
                            dataType: 'JSON',
                            success: function (data) {
                                if (data.status) {
                                    suspended.row($(_this).parents('tr'))
                                        .remove()
                                        .draw();
                                    live.draw();
                                    swal.close();
                                } else {
                                    swal({
                                        text: data.message,
                                        icon: 'error',
                                    });
                                }
                            },
                            error: function (data) {
                                swal({
                                    text: data.message,
                                    icon: 'error',
                                });
                            }

                        });
                    }
                });
            })

            $('body').on('click', 'a.destroy-btn', function () {
                var _this = $(this);
                swal({
                    text: "Are you sure you want to delete this product permanently?",
                    icon: "info",
                    buttons: true,

                }).then(willRestore => {
                    if (willRestore) {
                        $.ajax({
                            type: 'POST',
                            url: 'http://127.0.0.1:8000/api/product/delete',
                            data: {'_token': '{{ csrf_token() }}', 'id': $(_this).data('id')},
                            dataType: 'JSON',
                            success: function (data) {
                                if (data.status) {
                                    suspended.row($(_this).parents('tr'))
                                        .remove()
                                        .draw();
                                    swal.close();
                                } else {
                                    swal({
                                        text: data.message,
                                        icon: 'error',
                                    });
                                }
                            },
                            error: function (data) {
                                swal({
                                    text: data.message,
                                    icon: 'error',
                                });
                            }

                        });
                    }
                });
            })
        });

    </script>

@endsection