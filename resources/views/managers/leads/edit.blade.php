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
                                    <h4>Клиент 1</h4>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Имя</label>
                                            <input value="{{ $lead->name1 }}" required name="name1" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Телефон</label>
                                            <input value="{{ $lead->phone1 }}" required name="phone1" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1" style="margin-top: 21px;">
                                            <label>Email</label>
                                            <input value="{{ $lead->email }}" required name="email" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                    <hr style="margin-top: 25px;">
                                    <h4>Клиент 2</h4>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Имя</label>
                                            <input value="{{ $lead->name2 }}" required name="name2" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Телефон</label>
                                            <input value="{{ $lead->phone2 }}" required name="phone2" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Статус</label>
                                            <select required data-md-selectize name="status_id">
                                                <option value="{{ $lead->status->id }}">{{ $lead->status->name }}</option>
                                                @if(count($lead_statuses) > 0)
                                                    @foreach($lead_statuses as $lead_status)
                                                        <option value="{{ $lead_status->id }}">{{ $lead_status->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Клуб</label>
                                            <select required data-md-selectize name="club_id">
                                                <option value="{{ $lead->club->id }}">{{ $lead->club->name }}</option>
                                                @if(count($clubs) > 0)
                                                    @foreach($clubs as $club)
                                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Менеджер</label>
                                            <select data-md-selectize name="manager_id">
                                                @if($lead->manager == null)
                                                    <option value="">Администратор</option>
                                                @else
                                                    <option selected value="{{ $lead->manager->id }}">{{ $lead->manager->name }}</option>
                                                @endif
                                                @if(count($managers) > 0)
                                                    @foreach($managers as $manager)
                                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 25px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Имя ребенка</label>
                                            <input value="{{ $lead->child_name }}" required name="child_name" type="text" class="md-input label-fixed" required/>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>День рождения</label>
                                            <input value="{{ $lead->birthday }}" required name="birthday" id="birthday_datepicker_a" value="{{ \Carbon\Carbon::now() }}" />
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Уровень</label>
                                            <select required data-md-selectize name="level_id">
                                                <option value="{{ $lead->level->id }}">{{ $lead->level->name }}</option>
                                                @if(count($levels) > 0)
                                                    @foreach($levels as $level)
                                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 25px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Запрос</label>
                                            <select data-md-selectize name="request_id">
                                                @if($lead->request != null)
                                                    <option value="{{ $lead->request->id }}">{{ $lead->request->name }}</option>
                                                @endif
                                                @if(count($requests) > 0)
                                                    @foreach($requests as $request)
                                                        <option value="{{ $request->id }}">{{ $request->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <div class="uk-form-row">
                                                <textarea name="request_text" cols="30" rows="4" class="md-input">{{ $lead->request_text }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 25px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <h3>Источник трафика</h3>
                                        <div class="uk-width-medium-1-1">
                                            <label>Запрос</label>
                                            <select data-md-selectize name="request_id">
                                                @if($lead->request != null)
                                                    <option value="{{ $lead->request->id }}">{{ $lead->request->name }}</option>
                                                @endif
                                                @if(count($requests) > 0)
                                                    @foreach($requests as $request)
                                                        <option value="{{ $request->id }}">{{ $request->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <div class="uk-form-row">
                                                <textarea name="request_text" cols="30" rows="4" class="md-input">{{ $lead->request_text }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 25px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Tel</label>
                                            <input value="{{ $lead->tel }}" name="tel" type="text" class="md-input label-fixed"/>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Ch</label>
                                            <input value="{{ $lead->ch }}" name="ch" type="text" class="md-input label-fixed"/>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>own</label>
                                            <input value="{{ $lead->own }}" name="own" type="text" class="md-input label-fixed"/>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>pl</label>
                                            <input value="{{ $lead->pl }}" name="pl" type="text" class="md-input label-fixed"/>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>url</label>
                                            <input value="{{ $lead->url }}" name="url" type="text" class="md-input label-fixed"/>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 25px;">
                                    <?php
                                    use App\Models\Manager;
                                    $user = Auth::user();
                                    $name = "";
                                    $manager = Manager::where('user_id', $user->id)->first();
                                    if ($manager == null)
                                    {
                                        $name = "Admin";
                                    } else {
                                        $name =$manager->name." ".$manager->surname;
                                    }

                                    ?>
                                    <p>
                                        Создал {{ $name }} || {{ $lead->created_at }}
                                    </p>
                                </div>
                                <button style="margin-top: 21px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                    Создать
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-1-2">
{{--            <div class="md-card">--}}
{{--                <div class="md-card-content">--}}
{{--                    <h3 class="heading_a uk-margin-small-bottom">Запись на пробную тренировку</h3>--}}
{{--                    @if(!$lead->temp_user)--}}
{{--                    <form action="{{route('manager.temp_users.store', $lead->id)}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" name="lead_id" value="{{$lead->id}}">--}}
{{--                        <div class="uk-form-row">--}}
{{--                            <label>Имя</label>--}}
{{--                            <input name="name" type="text" class="md-input" />--}}
{{--                        </div>--}}
{{--                        <div class="uk-form-row">--}}
{{--                            <select required data-md-selectize name="group_id" id="group">--}}
{{--                                <option value="">Выберите клуб</option>--}}
{{--                                @foreach($clubs as $club)--}}
{{--                                <optgroup label="{{$club->name}} - {{$club->description}}">--}}
{{--                                    @foreach($club->groups as $group)--}}
{{--                                    <option value="{{ $group->id }}">{{ $group->age_start }} - {{ $group->age_end }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </optgroup>--}}
{{--                                @endforeach--}}
{{--                                <span class="uk-form-help-block">Default</span>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <p class="uk-text-muted">Выберите пробную тренировку</p>--}}
{{--                        <ul class="md-list md-list-addon" id="trainings">--}}
{{--                        </ul>--}}
{{--                        <button class="md-btn md-btn-primary">Записать</button>--}}
{{--                    </form>--}}
{{--                    @else--}}
{{--                        <a href="{{route('manager.trainings.edit', $lead->temp_user->training->id)}}" class="uk-alert uk-alert-danger" data-uk-alert>--}}
{{--                            {{$lead->temp_user->name}} записан на пробную тренировку {{$lead->temp_user->training->start->format('d/m/Y H:i')}}--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}


            <div class="md-card">
                <div class="md-card-content">
                    @if($lead->comments != null)
                        <div style="overflow-y: scroll; height:400px;">
                        @foreach($lead->comments as $comment)
                            <div class="md-card-content">
                                <h3>{{ $comment->created_at }}</h3>
                                {!!  $comment->comment !!}
                            </div>
                            <hr>
                        @endforeach
                        </div>
                    @endif
                        <form action="{{route('manager.lead_comment.store', $lead->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="lead_id" value="{{$lead->id}}">
                            <div class="uk-form-row">
                                <textarea name="comment" cols="30" rows="4" class="md-input"></textarea>
                            </div>
                            <button style="margin-top: 20px" type="submit" class="md-btn md-btn-primary">Сохранить</button>
                        </form>
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
                    <form action="/manager/task/store" method="POST">
                        @csrf
                        <input type="hidden" name="lead_id" value="{{ $lead->id }}">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
{{--                                <div class="uk-form-row" style="margin-top: 20px;">--}}
{{--                                    <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                        <div class="uk-width-medium-1-1">--}}
{{--                                            <label>Заголовок"</label>--}}
{{--                                            <input id="title"  style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                    <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                        <div class="uk-width-medium-1-1">--}}
{{--                                            <label>Статус</label>--}}
{{--                                            <select data-md-selectize name="status_id">--}}
{{--                                                @if(count($statuses) > 0)--}}
{{--                                                    @foreach($statuses as $status)--}}
{{--                                                        <option value="{{ $status->id }}">{{ $status->name }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                @endif--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                    <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                        <div class="uk-width-medium-1-1">--}}
{{--                                            <label>Менеджер</label>--}}
{{--                                            <select required data-md-selectize name="manager_id">--}}
{{--                                                @if(count($managers) > 0)--}}
{{--                                                    @foreach($managers as $manager)--}}
{{--                                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                @endif--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Дедлайн</label>
                                            <input style="float: right;" name="deadline" id="deadline" />
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                    <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                        <div class="uk-width-medium-1-1">--}}
{{--                                            <label>Описание</label>--}}
{{--                                            <textarea id="description"  name="description" cols="30" rows="4" class="md-input">--}}
{{--                                                    </textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
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
                                <button type="submit"
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
                                class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom"
                                href="#nav">
                            Редактировать
                        </button>
                    </div>

                    <div class="md-card expandable" style="margin-top: 20px;display: none;"  id="task_form_edit{{$i}}">
                        <div class="md-card-content">
                            <form id="formUpdate" action="/manager/task/update" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $task->id }}">
                                <input type="hidden" name="lead_id" value="{{ $lead->id }}">
                                @if($tasks->first()->tag_in_task != null)
                                    <input type="hidden" name="uuid" value="{{ $tasks->first()->tag_in_task->uuid }}">
                                @endif
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
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
{{--                                                        @if($task->status != null)--}}
{{--                                                            <option value="{{ $task->status->id }}">{{ $task->status->name }}</option>--}}
{{--                                                        @endif--}}
{{--                                                        @if(count($statuses) > 0)--}}
{{--                                                            @foreach($statuses as $status)--}}
{{--                                                                <option value="{{ $status->id }}">{{ $status->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        @endif--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="uk-form-row" style="padding-bottom: 20px;">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <label>Дедлайн</label>
                                                    <input value="{{ $task->deadline }}" style="float: right;" name="deadline" id="deadline_{{ $task->id }}" />
                                                </div>
                                            </div>
                                        </div>
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
