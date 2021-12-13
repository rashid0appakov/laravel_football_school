@extends('managers.layouts.app')

@section('content')

    <div id="page_content_inner" style="display: -webkit-box;">
        <div class="uk-grid" data-uk-grid-margin style="width: 100%;">
            <div class="uk-width-medium-1-2" style="margin-top: 20px;">
                <div id="tasks_calendar"></div>
            </div>
            <div class="uk-width-medium-1-2" style="margin-top: 20px;">
                <button id="open-form"
                         class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom js-open-modal"
                         href="#nav"
                         data-modal="return">
                    Создать задачу
                </button>
                @if($errors->any())
                    <div class="uk-alert uk-alert-danger" data-uk-alert="">
                        {{$errors->first()}}
                    </div>
                @endif
                @if(\Session::has('success'))
                    <div class="uk-alert uk-alert-success" data-uk-alert="">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
<div class="backos"></div>
<div class="modal js-modal" data-modal="return" >
<svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>

                    <div class="md-card-content">
                        <h3 class="heading_a">Новая задача</h3>
                        <form id="form" action="/manager/task/store" method="POST">
                            @csrf
                            <input type="hidden" name="manager_id" value="{{ $manager->id }}">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row" style="margin-top: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label>Заголовок"</label>
                                                <input id="title" style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label>Статус</label>
                                                <select data-md-selectize name="status_id">
                                                    @if(count($statuses) > 0)
                                                        @foreach($statuses as $status)
                                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label>Дедлайн</label>
                                                <input style="float: right;" name="deadline" id="deadline" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label>Описание</label>
                                                <textarea id="description" name="description" cols="30" rows="4" class="md-input">
                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label>Теги</label>
                                                <br>
                                                <select style="width: 90% !important;" id="" name="tasktags[]" size="{{ count($tasktags) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>
                                                    @foreach($tasktags as $tasktag)
                                                        <option value="{{ $tasktag->id }}">{{ $tasktag->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="return checkTasksField()"
                                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">
                                        Создать
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
       </div>
                @if(count($tasks) > 0)
                    <?php
                    $i = 1;
                    ?>
                    @foreach($tasks as $task)
                        <div class="md-card" style="margin-top: 20px;">
                            <div class="md-card-content">
                                <h3 class="heading_a">#{{ $task->id }}</h3>
                                <div class="uk-grid" data-uk-grid-margin style="margin-top: 2px;">
                                    <div class="uk-width-medium-1-1">
                                        <div class="uk-form-row">
                                            <span>{{ $task->deadline }}</span>
                                            <br>
                                            Задача {{ $task->title }}
                                            <div>
                                                @if(count($task->tags) > 0)
                                                    @foreach($task->tags as $tag)
                                                        <span style="background: {{ $tag->color }}" class="uk-badge uk-badge-success">{{ $tag->name }}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button style="margin: 20px;margin-top: 0px;" onclick="return edit_manager_task_form({{ $i }})"
                                    class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom js-open-modal"
                                    href="#nav"
                                    data-modal="formpdate">
                                Редактировать
                            </button>
                        </div>
<div class="backos"></div>
<div class="modal js-modal" tabindex="-1" data-modal="formpdate" aria-hidden="true">
    <div class="modal__cross js-modal-close">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
   </div>

                            <div class="md-card-content">
                                <form action="/manager/task/update" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <div class="uk-form-row" style="margin-top: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label>Заголовок"</label>
                                                        <input id="titleUpdate" value="{{ $task->title }}" style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label>Статус</label>
                                                        <select data-md-selectize name="status_id">
                                                            @if($task->status != null)
                                                                <option value="{{ $task->status->id }}">{{ $task->status->name }}</option>
                                                            @endif
                                                            @if(count($statuses) > 0)
                                                                @foreach($statuses as $status)
                                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label>Дедлайн</label>
                                                        <input value="{{ $task->deadline }}" style="float: right;" name="deadline_{{ $task->id }}" id="deadline_{{ $task->id }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label>Описание</label>
                                                        <textarea id="descriptionUpdate" name="description" cols="30" rows="4" class="md-input">
                                                                    {{ $task->description }}
                                                                </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label>Теги</label>
                                                        <br>
                                                        <select style="width: 90% !important;" id="" name="tasktags[]" size="{{ count($tasktags) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>
                                                            @if(count($task->tags) > 0)
                                                                @foreach($task->tags as $tag)
                                                                    <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                                @endforeach
                                                            @endif
                                                            @foreach($tasktags as $tasktag)
                                                                <option value="{{ $tasktag->id }}">{{ $tasktag->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                    class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">
                                                Сохранить
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php
                        $i++;
                        ?>
                    @endforeach
                @endif

        </div>
        </div>
    </div>
    </div>



@stop