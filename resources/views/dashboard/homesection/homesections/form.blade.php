@extends('dashboard.layout.layout')
@push('style')
    <link href="{{asset(app()->getLocale().'/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(app()->getLocale().'/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset(app()->getLocale().'/plugins/editors/markdown/simplemde.min.css')}}">
@endpush
@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row">
                <!-- Content -->
                @if(session()->has('success'))
                    <div class="alert alert-success col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                    <div class="user-profile layout-spacing">
                        <div class="widget-content widget-content-area">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                                <div class="d-flex justify-content-between">
                                    <?php
                                    $name = isset($id) ? $id : 'about';
                                    $trans = isset($model)? $model->type:$name;
                                    ?>
                                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-3 py-2">
                                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{__('dash.home')}}</a></li>
                                            <li class="breadcrumb-item" ><a href="{{route('dashboard.homesection.homesections.index', isset($model)? $model->type:$name)}}">{{__('dash.'.$trans)}}</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">{{isset($model)? __('dash.edit'):__('dash.create')}}</li>
                                        </ol>
                                    </nav>

{{--                                    <h3 class="">{{__('dash.home_sections')}}/{{__('dash.'.$name)}}</h3>--}}
                                </div>
                                <form method="post"
                                      action="{{isset($model)?route('dashboard.homesection.homesections.update', $model) : route('dashboard.homesection.homesections.store')}}"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row mb-3">
                                        <div class="custom-file-container form-group"
                                             data-upload-id="mySecondImage">
                                            <label>{{__('dash.upload')}}<a href="javascript:void(0)"
                                                                           class="custom-file-container__image-clear"
                                                                           title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       name="image"
                                                >
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>

                                    </div>
                                    @if(isset($model))
                                        <input type="hidden" name="type" value="{{$model->type}}">
                                    @else
                                        <input type="hidden" name="type" value="{{$id}}">
                                    @endif
                                    <div class="form-row mb-3">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">{{__('dash.arabic_title')}}</label>
                                            <input type="text" name="title[ar]" class="form-control"
                                                   id="inputEmail4"
                                                   placeholder="{{__('dash.arabic_title')}}"
                                                   value="{{isset($model)?$model->getTranslation('title', 'ar') : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">{{__('dash.english_title')}}</label>
                                            <input type="text" name="title[en]" class="form-control"
                                                   id="inputPassword4"
                                                   placeholder="{{__('dash.english_title')}}"
                                                   value="{{isset($model)?$model->getTranslation('title', 'en') : ''}}">
                                        </div>
                                    </div>

                                    <div class="form-row mb-0">
                                        <div class="form-group col-md-5 mb-0">
                                            <div class="col-md-10 mx-2">
                                                <h4>{{__('dash.arabic_description')}}</h4>
                                            </div>
                                            <div class="widget-content widget-content-area col-md-12">
                                                <textarea
                                                    rows="5"
                                                    required
                                                    name="description[ar]"
                                                    id="editor2"
                                                    class="ckeditor"
                                                    placeholder="{{__('dash.arabic_description')}}"
                                                >
                                                    {{isset($model)?$model->getTranslation('description', 'ar') : ''}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5 mb-0">
                                            <div class="col-md-10 mx-2">
                                                <h4>{{__('dash.english_description')}}</h4>
                                            </div>
                                            <div class="widget-content widget-content-area col-md-12">
                                                        <textarea
                                                            rows="5"
                                                            required
                                                            name="description[en]"
                                                            id="editor1"
                                                            class="ckeditor"
                                                            placeholder="{{__('dash.english_description')}}"
                                                        >
                                                            {{isset($model)?$model->getTranslation('description', 'en') : ''}}
                                                        </textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <button type="submit"
                                                class="btn btn-primary col-md-5">{{__('dash.submit')}}</button>
                                    </div>
                                </form>
                            </div>
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
            <script>
                $(function () {
                    CKEDITOR.editorConfig = function (config) {
                        config.baseFloatZIndex = 102000;
                        config.FloatingPanelsZIndex = 100005;
                    };
                    CKEDITOR.replace('editor1', {
                        language: 'ar',
                        extraPlugins: 'colorbutton,colordialog',
                        filebrowserUploadUrl: "{{asset('admin_dashboard/bower_components/ckeditor/ck_upload_master')}}",
                        filebrowserUploadMethod: 'form'
                    });
                });
            </script>
            <script>
                $(function () {
                    CKEDITOR.editorConfig = function (config) {
                        config.baseFloatZIndex = 102000;
                        config.FloatingPanelsZIndex = 100005;
                    };
                    CKEDITOR.replace('editor2', {
                        language: 'en',
                        extraPlugins: 'colorbutton,colordialog',
                        filebrowserUploadUrl: "{{asset('admin_dashboard/bower_components/ckeditor/ck_upload_master')}}",
                        filebrowserUploadMethod: 'form'
                    });
                });
            </script>
            <script>
                let secondUpload = new FileUploadWithPreview('mySecondImage')
            </script>
    @endpush
@endsection
