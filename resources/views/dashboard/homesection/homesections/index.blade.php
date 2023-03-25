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
                        <div class="seperator-header layout-top-spacing d-flex justify-content-between">
                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 py-2">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{__('dash.home')}}</a></li>
                                    <li class="breadcrumb-item" ><a href="{{route('dashboard.homesection.homesections.index', request()->route('id'))}}">{{__('dash.'.request()->route('id'))}}</a></li>
                                </ol>
                            </nav>
                            @if(request()->route('id') != 'about')
                                <a href="{{route('dashboard.homesection.homesections.create', request()->route('id'))}}"
                                   class="btn btn-primary">{{__('dash.add_new')}}</a>
                            @endif
                        </div>
                        {{$dataTable->table(['class'=>'table table-hover non-hover text-center'])}}
                        {{--                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">--}}

                        {{--                        </table>--}}
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
    {{$dataTable->scripts()}}
            <script>
                $(document).on('click', '.btn-delete', function () {
                    let id = $(this).data('id');
                    let url = 'http://127.0.0.1:8000/admin/homesection/homesections/'+id+'/delete'
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
    @endpush

@endsection
