@extends('dashboard.layout.layout')
@push('style')
    <link href="{{asset(app()->getLocale().'/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row row-sm">
                            <div class="col-md-12 col-xl-12">
                                <div class=" main-content-body-invoice">
                                    <div class="card card-invoice">
                                        <div class="card-body">
                                            <div class="invoice-header">
                                                <nav class="breadcrumb-one" aria-label="breadcrumb">
                                                    <ol class="breadcrumb mb-3 py-2">
                                                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{__('dash.home')}}</a></li>
                                                        <li class="breadcrumb-item" ><a href="{{route('dashboard.core.contacts.index')}}">{{__('dash.contacts')}}</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">{{__('dash.show')}}</li>
                                                    </ol>
                                                </nav>
                                                <div class="billed-from">
                                                    <h6>{{ $contact->first_name.' '. $contact->first_name}}</h6>
                                                    <p>
                                                        {{ __('dash.tel_no') }}: {{ $contact->phone }} <br>
                                                        {{ __('dash.email') }}: {{ $contact->email }}</p>
                                                </div>
                                            </div>
                                            <div class="row mg-t-20">
                                                <div class="col-md-6">
                                                    <label class="tx-gray-600">{{ __('dash.contact_message') }}</label>
                                                    <p class="invoice-info-row">

                                                        {{ $contact->message }}
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- COL-END -->
                        </div>

                    </div>
                </div>

            </div>

        </div>
        @push('script')
            <script src="{{asset(app()->getLocale().'/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
            <script src="{{asset(app()->getLocale().'/plugins/table/datatable/datatables.js')}}"></script>
            <script
                src="{{asset(app()->getLocale().'/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset(app()->getLocale().'/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
            <script
                src="{{asset(app()->getLocale().'/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
            <script
                src="{{asset(app()->getLocale().'/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
    @endpush

@endsection
