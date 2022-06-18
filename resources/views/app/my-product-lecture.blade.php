@extends('layouts.backend' , [$closedSidebar = false])
@section('css_after')
    <style>
        .cropped-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <style scoped>
        .gallery.editable .gallery-item {
            cursor: pointer;
        }

        .gallery .gallery-item-image.gallery-item {
            width: 200px;
            height: 200px;
        }

        .gallery.editable .gallery-item {
            cursor: pointer;
        }

        .gallery .gallery-item {
            float: left;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            border-radius: 10px;
            background-color: #f9fafc;
        }

        .gallery .gallery-item-image.gallery-item .gallery-item-info {
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-color: #f9fafc;
            border-radius: 10px;
            position: absolute;
            z-index: 10;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .gallery .gallery-item .gallery-item-info {
            display: flex;
            background-color: #f9fafc;
            border-radius: 10px;
            z-index: 10;
        }

        .gallery .gallery-item-image.gallery-item .gallery-image {
            -o-object-fit: contain;
            object-fit: contain;
            display: block;
            max-height: 100%;
            border-radius: 10px;
        }

        .gallery-item-file.gallery-item {
            width: 100%;
        }

        .gallery-item-file.gallery-item .gallery-item-info a .label {
            flex-grow: 1;
            color: #495057;
        }

    </style>
@endsection
@section('content')
    <!-- Hero -->
    <div class="bg-dark bg-image" style="background-image: url({{ $lecture->main_image_path }});">
        <div class="bg-white-75">
            <div class="content content-full">
                <div class="py-4 text-center">
                    <h2 class="font-w700 mb-3 text-primary-darker">
                        {{$lecture->name}}
                    </h2>
                    <h3 class="font-size-sm mb-3 font-w400 font-italic text-primary-dark">
                        {{$lecture->description}}
                    </h3>
                    <div class="progress push">
                        <div class="progress-bar bg-gd-primary" role="progressbar" style="width: {{$lecture->getProgress()}}%;"
                             aria-valuenow="{{$lecture->getProgress()}}"
                             aria-valuemin="0" aria-valuemax="100">
                            <span class="font-size-sm font-w600">{{$lecture->getProgress()}}%</span>
                        </div>
                    </div>
                    @if($lecture->getNextLecture())
                        <a class="btn btn-hero-primary bg-gd-primary"
                           href="/my-products/{{$lecture->product->slug}}/{{$lecture->getNextLecture()->slug}}"
                           data-toggle="click-ripple">
                            <i class="fa fa-play mr-1"></i> Next Lesson
                        </a>
                    @elseif($lecture->getPreviousLecture())
                        <a class="btn btn-hero-primary bg-gd-primary"
                           href="/my-products/{{$lecture->product->slug}}/{{$lecture->getPreviousLecture()->slug}}"
                           data-toggle="click-ripple">
                            <i class="fa fa-play mr-1"></i> Previous Lesson
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="content" id="vue-lectures">
        <!-- Horizontal Navigation - Hover Centered -->
        <div class="bg-white p-3 rounded push">
            <!-- Toggle Navigation -->
            <div class="d-lg-none">
                <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                <button type="button" class="btn btn-block btn-light d-flex justify-content-between align-items-center"
                        data-toggle="class-toggle" data-target="#horizontal-navigation-hover-centered"
                        data-class="d-none">
                   Menu
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- END Toggle Navigation -->

            <!-- Navigation -->
            <div id="horizontal-navigation-hover-centered" class="d-none d-lg-block mt-2 mt-lg-0">
                <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center">
                    <li class="nav-main-item">
                        <a class="nav-main-link " :class="showElement == 'lecture' ? ' active' : ''"
                           href="javascript:void(0)" @click="showElement = 'lecture'">
                            <i class="nav-main-link-icon fas fa-book"></i>
                            <span class="nav-main-link-name">Lesson</span>
                        </a>
                    </li>
                    @foreach($lecture->tasks as $k => $task)
                        <li class="nav-main-item">
                            <a class="nav-main-link " :class="showElement == 'task-{{$k}}' ? ' active' : ''"
                               href="javascript:void(0)" @click="showElement = 'task-{{$k}}'">
                                <i class="nav-main-link-icon fas fa-tasks"></i>
                                <span class="nav-main-link-name">Task {{$k + 1}}</span>
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-main-item">
                        <a class="nav-main-link " :class="showElement == 'action' ? ' active' : ''"
                           href="javascript:void(0)" @click="showElement = 'action'">
                            <i class="nav-main-link-icon fas fa-spinner"></i>
                            <span class="nav-main-link-name">Progress</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Navigation -->
        </div>
        <!-- END Horizontal Navigation - Hover Centered -->

        <!-- Dummy content -->
        <div class="block block-rounded block-bordered d-lg-block">
            <div class="block-content" style="background-image: url( {{ asset($lecture->back_image_path) }} );">
                <div :style="showElement == 'lecture' ? '' : 'display: none'">
                    @if($lecture->is_frame)
                        <iframe id="iframe-new"
                                src="/frame/{{$lecture->id}}"
                                style="width: 100%; height: {{$lecture->frame_height}}px"
                                allowfullscreen="allowfullscreen"
                                frameBorder="0"
                                mozallowfullscreen="mozallowfullscreen"
                                msallowfullscreen="msallowfullscreen"
                                oallowfullscreen="oallowfullscreen"
                                webkitallowfullscreen="webkitallowfullscreen">

                        </iframe>
                @else
                    @include($lecture->view_name)
                @endif
                <!-- Files Content -->
                    <div class="gallery editable" slot="value">
                        <div class="gallery-list clearfix">
                            @foreach($lecture->getMedia('multi_files_collection') as $file)
                                <div class="gallery-item gallery-item-file mb-3 p-3 mr-3" style="border-radius: 0;">
                                    <div class="gallery-item-info">
                                        <a href="{{$file->getUrl()}}" target="_blank" class="download mr-2"
                                           draggable="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 viewBox="0 0 20 20" aria-labelledby="search" role="presentation"
                                                 class="fill-current">
                                                <path fill-rule="nonzero"
                                                      d="M14.32 12.906l5.387 5.387a1 1 0 0 1-1.414 1.414l-5.387-5.387a8 8 0 1 1 1.414-1.414zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{$file->getUrl()}}" class="download mr-2" draggable="false"
                                           target="_blank">
                                            <span class="label">{{$file->file_name}}</span>
                                        </a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--  End of Files Tab Content -->
                </div>
                @foreach($lecture->tasks as $k => $task)
                    <div :style="showElement == 'task-{{$k}}' ? '' : 'display: none'" id="task-{{$k}}">
                    @include($task->view_name)
                    <!-- Files Tab Content -->
                        <div class="gallery editable" slot="value">
                            <div class="gallery-list clearfix">
                                @foreach($task->getMedia('multi_files_collection') as $file)
                                    <div class="gallery-item gallery-item-file mb-3 p-3 mr-3" style="border-radius: 0;">
                                        <div class="gallery-item-info">
                                            <a href="{{$file->getUrl()}}" target="_blank" class="download mr-2"
                                               draggable="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     viewBox="0 0 20 20" aria-labelledby="search" role="presentation"
                                                     class="fill-current">
                                                    <path fill-rule="nonzero"
                                                          d="M14.32 12.906l5.387 5.387a1 1 0 0 1-1.414 1.414l-5.387-5.387a8 8 0 1 1 1.414-1.414zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{$file->getUrl()}}" class="download mr-2" draggable="false"
                                               target="_blank">
                                                <span class="label">{{$file->file_name}}</span>
                                            </a>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--  End of Files Tab Content -->
                    </div>
                @endforeach


                <div :style="showElement == 'action' ? '' : 'display: none'">
                    <input type="hidden" id="progress-bar-value" class="js-bar-randomize">
                    <div class="form-group row items-push mb-0">
                        <div class="col-md-6">
                            <div class="custom-control custom-block custom-control-warning">
                                <input type="checkbox" class="custom-control-input" id="lecture-checkbox"
                                       name="lecture-checkbox" @change="saveAction('lecture', {{$lecture->id}})"
                                       @if($lecture->checkForInteraction('lecture')) checked @endif>
                                <label class="custom-control-label" for="lecture-checkbox">
                                                    <span class="d-block text-center">
                                                        <i class="fas fa-book fa-2x mb-2 text-black-50"></i><br>
                                                        Studying Lecture
                                                    </span>
                                </label>
                                <span class="custom-block-indicator">
                                    <i class="fa fa-check"></i>
                                </span>
                            </div>
                        </div>
                        @foreach($lecture->tasks as $k => $task)
                            <div class="col-md-6">
                                <div class="custom-control custom-block custom-control-warning">
                                    <input type="checkbox" class="custom-control-input" id="task-{{$k}}-checkbox"
                                           name="task-{{$k}}-checkbox"
                                           @change="saveAction('task-{{$task->id}}', {{$lecture->id}})"
                                           @if($lecture->checkForInteraction('task-' . $task->id)) checked @endif>
                                    <label class="custom-control-label" for="task-{{$k}}-checkbox">
                                                    <span class="d-block text-center">
                                                        <i class="fas fa-tasks fa-2x mb-2 text-black-50"></i><br>
                                                        Completing Task №{{$k + 1}}
                                                    </span>
                                    </label>
                                    <span class="custom-block-indicator">
                                    <i class="fa fa-check"></i>
                                </span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
        <!-- END Dummy content -->
    </div>
@endsection
@section('js_after')
    <script src="/js/pages/be_ui_progress.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('page-header-loader').classList.add('overlay-header');
            let el = document.getElementById('tab-buttons');
            if(el) {
                if(!window.matchMedia("(min-width: 400px)").matches) {
                    el.classList.remove('btn-group');
                    el.classList.add('btn-group-vertical');
                }
                else {
                    el.classList.remove('btn-group-vertical');
                    el.classList.add('btn-group');
                }
            }
        });
    </script>
    <script>
        $(window).resize(function(){
            let el = document.getElementById('tab-buttons');
            if(el) {
                if(!window.matchMedia("(min-width: 400px)").matches) {
                    el.classList.remove('btn-group');
                    el.classList.add('btn-group-vertical');
                }
                else {
                    el.classList.remove('btn-group-vertical');
                    el.classList.add('btn-group');
                }
            }
        });
    </script>
@endsection
