@extends('managers.layouts.app')

@section('content')
<div id="page_content_inner">

    <div class="uk-vertical-align-middle">
        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/manager/crm/leads">
            Вернуться назад
        </a>
    </div>

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
    <hr>
    <div class="uk-grid">
        <div class="uk-width-1-2">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a"></h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <form action="/manager/crm/leads/{{ $lead->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $lead->id }}">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Канал</label>
                                        <select data-md-selectize name="channel_id">
                                            @if($lead->channel != null)
                                                <option selected value="{{ $lead->channel->id }}">{{ $lead->channel->name }}</option>
                                            @endif
                                            @if(count($channels) > 0)
                                                @foreach($channels as $channel)
                                                    <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Точка входа</label>
                                        <select data-md-selectize name="entry_point_id">
                                            @if($lead->entry_point != null)
                                                <option selected value="{{ $lead->entry_point->id }}">{{ $lead->entry_point->name }}</option>
                                            @endif
                                            @if(count($entry_points) > 0)
                                                @foreach($entry_points as $entry_point)
                                                    <option value="{{ $entry_point->id }}">{{ $entry_point->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Тип</label>
                                        <select data-md-selectize name="lead_type_id">
                                            @if($lead->lead_type != null)
                                                <option selected value="{{ $lead->lead_type->id }}">{{ $lead->lead_type->name }}</option>
                                            @endif
                                            @if(count($lead_types) > 0)
                                                @foreach($lead_types as $lead_type)
                                                    <option value="{{ $lead_type->id }}">{{ $lead_type->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2" style="margin-top: 21px;">
                                        <label>Email</label>
                                        <input name="email" value="{{ $lead->email }}" type="text" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Клуб</label>
                                        <select required data-md-selectize name="club_id">
                                            @if($lead->club)<option selected value="{{ $lead->club->id }}">{{ $lead->club->name }}</option>@endif
                                            @if(count($clubs) > 0)
                                                @foreach($clubs->where('frozen', 0) as $club)
                                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Имя предаставителя</label>
                                        <input name="name" value="{{ $lead->name }}" type="text" class="md-input label-fixed" required/>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Телефон</label>
                                        <input name="phone" value="{{ $lead->phone }}" type="text" class="md-input label-fixed" required/>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2" style="margin-top: 21px;">
                                        <label>Менеджер</label>
                                        <select data-md-selectize name="manager_id">
                                            @if($lead->manager)<option selected value="{{ $lead->manager->id }}">{{ $lead->manager->name }}</option>@endif
                                            @if(count($managers) > 0)
                                                @foreach($managers as $manager)
                                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Статус</label>
                                        <select data-md-selectize name="lead_status_id">
                                            @if($lead->status != null)
                                                <option selected value="{{ $lead->status->id }}">{{ $lead->status->name }}</option>
                                            @endif
                                            @if(count($lead_statuses) > 0)
                                                @foreach($lead_statuses as $lead_status)
                                                    <option value="{{ $lead_status->id }}">{{ $lead_status->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>URL</label>
                                        <input value="{{ $lead->url }}" name="url" type="text" class="md-input label-fixed" required/>
                                    </div>
                                </div>
                            </div>
                            <button style="margin-top: 21px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                Сохранить
                            </button>
                            </form>
                            <div>
                                <a style="float: right;" href="/manager/crm/leads/client-create/{{ $lead->id }}" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                    Создать клиента
                                </a>
                                <button data-phone="{{$lead->phone}}" style="float: right;margin-right: 20px;background: #2196f3;" class="call-button md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                    Позвонить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-1-2">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a uk-margin-small-bottom">Запись на пробную тренировку</h3>
                    @if(!$lead->temp_user)
                    <form action="{{route('manager.temp_users.store', $lead->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="lead_id" value="{{$lead->id}}">
                        <div class="uk-form-row">
                            <label>Имя</label>
                            <input name="name" type="text" class="md-input" />
                        </div>
                        <div class="uk-form-row">
                            <select required data-md-selectize name="group_id" id="group">
                                <option value="">Выберите клуб</option>
                                @foreach($clubs as $club)
                                <optgroup label="{{$club->name}} - {{$club->description}}">
                                    @foreach($club->groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->age_start }} - {{ $group->age_end }}</option>
                                    @endforeach
                                </optgroup>
                                @endforeach
                                <span class="uk-form-help-block">Default</span>
                            </select>
                        </div>
                        <p class="uk-text-muted">Выберите пробную тренировку</p>
                        <ul class="md-list md-list-addon" id="trainings">
                        </ul>
                        <button class="md-btn md-btn-primary">Записать</button>
                    </form>
                    @else
                        <a href="{{route('manager.trainings.edit', $lead->temp_user->training->id)}}" class="uk-alert uk-alert-danger" data-uk-alert>
                            {{$lead->temp_user->name}} записан на пробную тренировку {{$lead->temp_user->training->start->format('d/m/Y H:i')}}
                        </a>
                    @endif
                </div>
            </div>

            <button style="margin-top: 20px;" id="open-form"
                    class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom"
                    href="#nav">
                Создать задачу
            </button>
            <div class="md-card expandable" style="margin-top: 20px;display: none"  id="form">
                <div class="md-card-content">
                    <h3 class="heading_a">Новая задача</h3>
                    <form id="form" action="/manager/tasks/myTaskStore" method="POST">
                        @csrf
                        <input type="hidden" name="lead_id" value="{{ $lead->id }}">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row" style="margin-top: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Заголовок"</label>
                                            <input id="title"  style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />
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
                                            <label>Менеджер</label>
                                            <select required data-md-selectize name="manager_id">
                                                @if(count($managers) > 0)
                                                    @foreach($managers as $manager)
                                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
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
                                            <textarea id="description"  name="description" cols="30" rows="4" class="md-input">
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
{{--            @if(count($tasks) > 0)--}}
{{--                <?php--}}
{{--                $i = 1;--}}
{{--                ?>--}}
{{--                @foreach($tasks as $task)--}}
{{--                    <div class="md-card" style="margin-top: 20px;">--}}
{{--                        <div class="md-card-content">--}}
{{--                            <h3 class="heading_a">#{{ $task->id }}</h3>--}}
{{--                            <div class="uk-grid" data-uk-grid-margin style="margin-top: 2px;">--}}
{{--                                <div class="uk-width-medium-1-1">--}}
{{--                                    <div class="uk-form-row">--}}
{{--                                        <span>{{ $task->deadline }}</span>--}}
{{--                                        <br>--}}
{{--                                        Задача {{ $task->title }}--}}
{{--                                        <div>--}}
{{--                                            @if(count($task->tags) > 0)--}}
{{--                                                @foreach($task->tags as $tag)--}}
{{--                                                    <span style="background: {{ $tag->color }}" class="uk-badge uk-badge-success">{{ $tag->name }}</span>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button style="margin: 20px;margin-top: 0px;" onclick="return edit_admin_task_form({{ $i }})"--}}
{{--                                class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom"--}}
{{--                                href="#nav">--}}
{{--                            Редактировать--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                    <div class="md-card expandable" style="margin-top: 20px;display: none;"  id="task_form_edit{{$i}}">--}}
{{--                        <div class="md-card-content">--}}
{{--                            <form id="formUpdate" action="/admin/tasks/manager/managerTaskUpdate" method="POST">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="id" value="{{ $task->id }}">--}}
{{--                                <input type="hidden" name="lead_id" value="{{ $lead->id }}">--}}
{{--                                <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                    <div class="uk-width-medium-1-1">--}}
{{--                                        <div class="uk-form-row" style="margin-top: 20px;">--}}
{{--                                            <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                                <div class="uk-width-medium-1-1">--}}
{{--                                                    <label>Заголовок"</label>--}}
{{--                                                    <input id="titleUpdate" value="{{ $task->title }}" style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                            <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                                <div class="uk-width-medium-1-1">--}}
{{--                                                    <label>Статус</label>--}}
{{--                                                    <select data-md-selectize name="status_id">--}}
{{--                                                        <option value="{{ $task->status->id }}">{{ $task->status->name }}</option>--}}
{{--                                                        @if(count($statuses) > 0)--}}
{{--                                                            @foreach($statuses as $status)--}}
{{--                                                                <option value="{{ $status->id }}">{{ $status->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        @endif--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                            <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                                <div class="uk-width-medium-1-1">--}}
{{--                                                    <label>Дедлайн</label>--}}
{{--                                                    <input value="{{ $task->deadline }}" style="float: right;" name="deadline" id="birthday_datepicker_ch_{{ $task->id }}" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                            <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                                <div class="uk-width-medium-1-1">--}}
{{--                                                    <label>Менеджер</label>--}}
{{--                                                    <select required data-md-selectize name="manager_id">--}}
{{--                                                        <option selected value="{{ $task->manager->id }}">{{ $task->manager->name }}</option>--}}
{{--                                                        @if(count($managers) > 0)--}}
{{--                                                            @foreach($managers as $manager)--}}
{{--                                                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        @endif--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                            <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                                <div class="uk-width-medium-1-1">--}}
{{--                                                    <label>Описание</label>--}}
{{--                                                    <textarea id="descriptionUpdate" name="description" cols="30" rows="4" class="md-input">--}}
{{--                                                                    {{ $task->description }}--}}
{{--                                                                </textarea>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                            <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                                <div class="uk-width-medium-1-1">--}}
{{--                                                    <label>Теги</label>--}}
{{--                                                    <br>--}}
{{--                                                    <select style="width: 90% !important;" id="" name="tasktags[]" size="{{ count($tasktags) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>--}}
{{--                                                        @if(count($task->tags) > 0)--}}
{{--                                                            @foreach($task->tags as $tag)--}}
{{--                                                                <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        @endif--}}
{{--                                                        @foreach($tasktags as $tasktag)--}}
{{--                                                            <option value="{{ $tasktag->id }}">{{ $tasktag->name }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <button   onclick="return checkTasksFieldUpdate()" type="button"--}}
{{--                                                  class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">--}}
{{--                                            Сохранить--}}
{{--                                        </button>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <?php--}}
{{--                    $i++;--}}
{{--                    ?>--}}
{{--                @endforeach--}}
{{--            @endif--}}
        </div>
    </div>
</div>
<script>
    window.onload = function(){
        $('#group').change(function(){
            const group_id = $(this).val()
            $.get('/manager/groups/' + group_id + '/trainings')
            .success(function(data){
                let html = '';
                data.forEach( item => {
                    html += `
                    <li>
                        <label>
                            <div class="md-list-addon-element dynamic_radio">
                                <input type="radio" name="training_id" value="`+item.id+`" data-md-icheck />
                            </div>
                            <div class="md-list-content">
                                <div class="md-list-heading">` + item.start + `</div>
                                <span class="uk-text-small uk-text-muted">` + ( item.trainer ? item.trainer.name : 'Тренер не выбран') + `</span>
                            </div>
                        </label>
                    </li>
                    `
                })
                $('#trainings').html(html)
            })
        })
    }
</script>
@stop
