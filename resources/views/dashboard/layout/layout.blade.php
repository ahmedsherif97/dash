@php
    $messages = \App\Models\ContactUs::query()->latest()->take(5)->get();
    $notifies = \App\Models\Notification::query()->latest()->take(5)->get();
    $name = 'site_name_'.app()->getLocale();
@endphp
    <!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{\App\Models\Setting::first()?\App\Models\Setting::first()->$name : 'site name'}}</title>
    <link rel="icon" type="image/x-icon" href="{{asset(app()->getLocale().'/assets/img/favicon.ico')}}"/>
    <link href="{{asset(app()->getLocale().'/assets/css/loader.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset(app()->getLocale().'/assets/js/loader.js')}}"></script>
    <link href="{{asset(app()->getLocale().'/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(app()->getLocale().'/assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(app()->getLocale().'/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset(app()->getLocale().'/plugins/font-icons/fontawesome/css/regular.css')}}">
    <link rel="stylesheet" href="{{asset(app()->getLocale().'/plugins/font-icons/fontawesome/css/fontawesome.css')}}">
    <style>
        .feather-icon .icon-section {
            padding: 30px;
        }
        .feather-icon .icon-section h4 {
            color: #3b3f5c;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 16px;
        }
        .feather-icon .icon-content-container {
            padding: 0 16px;
            width: 86%;
            margin: 0 auto;
            border: 1px solid #bfc9d4;
            border-radius: 6px;
        }
        .feather-icon .icon-section p.fs-text {
            padding-bottom: 30px;
            margin-bottom: 30px;
        }
        .feather-icon .icon-container { cursor: pointer; }
        .feather-icon .icon-container svg {
            color: #3b3f5c;
            margin-right: 6px;
            vertical-align: middle;
            width: 20px;
            height: 20px;
            fill: rgba(0, 23, 55, 0.08);
        }
        .feather-icon .icon-container:hover svg {
            color: #4361ee;
            fill: rgba(27, 85, 226, 0.23921568627450981);
        }
        .feather-icon .icon-container span { display: none; }
        .feather-icon .icon-container:hover span { color: #4361ee; }
        .feather-icon .icon-link {
            color: #4361ee;
            font-weight: 600;
            font-size: 14px;
        }


        /*FAB*/
        .fontawesome .icon-section {
            padding: 30px;
        }
        .fontawesome .icon-section h4 {
            color: #3b3f5c;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 16px;
        }
        .fontawesome .icon-content-container {
            padding: 0 16px;
            width: 86%;
            margin: 0 auto;
            border: 1px solid #bfc9d4;
            border-radius: 6px;
        }
        .fontawesome .icon-section p.fs-text {
            padding-bottom: 30px;
            margin-bottom: 30px;
        }
        .fontawesome .icon-container { cursor: pointer; }
        .fontawesome .icon-container i {
            font-size: 20px;
            color: #3b3f5c;
            vertical-align: middle;
            margin-right: 10px;
        }
        .fontawesome .icon-container:hover i { color: #4361ee; }
        .fontawesome .icon-container span { color: #888ea8; display: none; }
        .fontawesome .icon-container:hover span { color: #4361ee; }
        .fontawesome .icon-link {
            color: #4361ee;
            font-weight: 600;
            font-size: 14px;
        }
    </style>
    <link href="{{asset(app()->getLocale().'/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset(app()->getLocale().'/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset(app()->getLocale().'/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset(app()->getLocale().'/assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset(app()->getLocale().'/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <style>
        body{
            font-family: Cairo, Serif !important;
        }
        .ck-editor__editable {
            height: 200px;
        }
    </style>
    @stack('style')
    <script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/ckeditor/ckeditor.js') }}"></script>
</head>
<body>
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->

@include('dashboard.layout.navbar')

<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    @include('dashboard.layout.sidebar')

    <!--  BEGIN CONTENT AREA  -->
    <div class="main-container w-100" id="container">
        @yield('content')
        <div class="text-center">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All
                    rights
                    reserved.</p>
                <p class="">Coded with
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-heart">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </p>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
</div>
<!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset(app()->getLocale().'/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset(app()->getLocale().'/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset(app()->getLocale().'/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset(app()->getLocale().'/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset(app()->getLocale().'/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>
<script src="{{asset(app()->getLocale().'/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset(app()->getLocale().'/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset(app()->getLocale().'/plugins/font-icons/feather/feather.min.js')}}"></script>
<script src="{{asset(app()->getLocale().'/plugins/sweetalerts/promise-polyfill.js')}}"></script>
<script src="{{asset(app()->getLocale().'/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset(app()->getLocale().'/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
<script type="text/javascript">
    feather.replace();
</script>
<script>
    $(document).ready(function (){
        let session = "{{session('success')}}"
        if (session){
            swal({
                title: "{{__('dash.successful_operation')}}",
                text: "{{__('dash.request_executed_successfully')}}",
                type: 'success',
                padding: '2em'
            })
        }
    })
    $(document).on('click', '.btn-delete', function () {
        let id = $(this).data('id');
        let url = window.location+'/'+id+'/delete'
        let that = $(this);
        swal.fire({
            title: "{{__('dash.Are_you_sure?')}}",
            text: "{{__("dash.You_won't_be_able_to_restore_it_again")}}",
            showCancelButton: true,
            confirmButtonText: "{{__('dash.Yes,delete')}}",
            cancelButtonText: "{{__('dash.No,cancel')}}"
        }).then((isConfirm) => {
            if (isConfirm.value) {
                $.post(url, {_method: 'GET'}).done(function (response) {
                    if (response.status) {
                        $('.table').DataTable().ajax.reload();
                        swal(
                           "{{__('dash.Deleted!')}}",
                           "{{__('dash.Your_file_has_been_deleted.')}}",
                            'success'
                        )
                    } else {
                        console.log('no')
                        console.log(response.status)
                        swalInit.fire("Failed!", 'Unexpected error occurred', "error");
                        console.log(response);
                    }
                })
            }
        });
    });

</script>
@stack('script')
</body>
</html>
