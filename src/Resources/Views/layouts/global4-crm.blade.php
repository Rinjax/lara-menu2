<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <meta name="csrf_token" content="{!! csrf_token() !!}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="{!! elixir('admin/css/app.css') !!}">
    <link rel="stylesheet" href="{!! elixir('admin/weeklybroadband/css/app.css') !!}">
    <link rel="stylesheet" href="{!! elixir('vendor/affinity/css/affinity-app.css') !!}">
    <link rel="stylesheet" href="{!! elixir('sales/css/app.css') !!}">
    <link rel="stylesheet" href="{!! elixir('admin/css/bootstrap-datetimepicker.css') !!}">
    <link rel="stylesheet" href="{!! elixir('admin/css/fullcalendar.css') !!}">
    <link rel="stylesheet" href="{!! elixir('admin/css/bootstrap-colorpicker.css') !!}">
    <link rel="stylesheet" href="{!! elixir('admin/css/bootstrap-toggle.min.css') !!}">

    @if(\DevManager::isXmas())
        <link rel="stylesheet" href="{!! url('css/xmas.css') !!}">
    @endif

    <script type="text/javascript" src="https://www.google.com/jsapi?autoload=
{'modules':[{'name':'visualization','version':'1.1','packages':
['corechart']}]}"></script>

    @yield('meta')

</head>
<body>

<header id="header">
    @if(strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), 'MSIE') !== false) {
    <div style="float:left; width:100%; padding:0.6rem; background: rgba(224,15,6,0.53); color:#fff">
        Warning! You are using Microsoft Internet Explorer. This is an out of date piece software,
        something will not work - Do not use.
    </div>
    @endif

    @if(\App::environment() != 'production')
        <div style="float:left; width:100%; padding:0.6rem; background: #882a08; color:#fff">
            Development Environment - Happy coding! {!! $_SERVER['HTTP_USER_AGENT'] !!}
        </div>
    @endif

    <div class="top-header">
        <div class="col-xs-8 col-md-6 space-1 pull-right">
            @include('admin.common.user-menu')
        </div>
    </div>

    @if(\Auth::check())
        <div class="hidden-md hidden-lg">
            <div class="col-xs-12">
                <a type="button" class="navbar-toggle btn btn-default" data-toggle="collapse" data-target="#navBar">
                    View Main Menu
                </a>
            </div>
        </div>
            {!! $menu !!}
    @endif



@include('admin.common.footer')

<script src="{!! elixir('admin/js/bootstrap.js') !!}"></script>

<script src="{!! url('admin/js/tinymce.min.js') !!}"></script>
<script src="{!! elixir('admin/js/libs.min.js') !!}"></script>
<script src="{!! elixir('admin/js/app.js') !!}"></script>
<script src="{!! elixir('admin/weeklybroadband/js/app.js') !!}"></script>
<script src="{!! elixir('admin/js/billing-recon.js') !!}"></script>
<script src="{!! url('admin/vue/vue-libraries.js') !!}"></script>
<script src="{!! url('admin/vue/idealbroadband.js') !!}"></script>
<script src="{!! url('admin/vue/weeklybroadband.js') !!}"></script>
<script src="{!! url('admin/vue/notifications.js') !!}"></script>
<script src="https://unpkg.com/vuejs-datepicker"></script>

@if(\DevManager::isXmas())
    <script src="{!! url('/js/fallingsnow.js') !!}"></script>
@endif

<script>
    //set the default for table
    $.extend($.fn.bootstrapTable.defaults, {
        sortable: true,
        search: true,
        showColumns: true,
        showExport: true,
        exportTypes: ['csv'],
        icons: {
            export: 'icon-download',
            columns: 'icon-equalizer'
        },
        reorderableColumns: true
    });
</script>

@yield('scripts')

</body>
</html>