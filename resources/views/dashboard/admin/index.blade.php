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
        .tab-content{
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            font-weight: 500;
        }
        .tab-pane{
            padding:23px;
        }
    </style>
@endsection

@section('sidebar')

    @include('dashboard.includes.nav-admin')

@endsection


@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <!--Begin::Section-->
            <div class="m-portlet m-portlet--mobilXe m-portlet--tabs align-item-senter">
                <div class="tab-content">
                    <div class="tab-pane active" id="live" role="tabpanel">
                      Welcome to product CRUD
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
