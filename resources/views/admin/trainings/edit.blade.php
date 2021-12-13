@extends('admin.layouts.app')

@section('content')

<div id="page_content_inner">
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-large-1-3">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_c uk-margin-medium-bottom">Настройки тренировки <br><b>{{$training->date}}</b></h3>
                    <form action="{{route('admin.trainings.update', $training->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="uk-form-row">
                            <input type="checkbox" name="closed" value="1" data-switchery @if($training->closed) checked @endif/>
                            <label class="inline-label">Подтверждена</label>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-input-group">
                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-clock-o"></i></span>
                                <label for="uk_tp_1">Изменить время начала</label>
                                <input class="md-input" name="start" type="text" id="uk_tp_1" value="{{$training->start}}" data-uk-timepicker>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-input-group">
                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-clock-o"></i></span>
                                <label for="uk_tp_1">Изменить время окончания</label>
                                <input class="md-input" name="end" type="text" id="uk_tp_1" value="{{$training->end}}" data-uk-timepicker>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <select data-md-selectize name="group_id">
                                <option value="">Выберите группу</option>
                                @foreach($clubs as $club)
                                <optgroup label="{{$club->name}} - {{$club->description}}">
                                    @foreach($club->groups as $group)
                                    <option value="{{ $group->id }}" @if($training->group_id == $group->id) selected @endif>{{ $group->age_start }} - {{ $group->age_end }}</option>
                                    @endforeach
                                </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="uk-form-row">
                            <select data-md-selectize name="trainer_id">
                                <option value="">Тренер</option>
                                @foreach($trainers as $trainer)
                                    <option value="{{ $trainer->id }}" @if($trainer->id == $training->trainer_id) selected @endif>{{ $trainer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="uk-form-row">
                            <label>Ставка1</label>
                            <input type="number" name="stavka1" class="md-input" value="{{$training->stavka1}}">
                        </div>
                        <div class="uk-form-row">
                            <label>Ставка2</label>
                            <input type="number" name="stavka2" class="md-input" value="{{$training->stavka2}}">
                        </div>
                        <div class="uk-form-row">
                            <label>Комментарии</label>
                            <textarea rows="3" name="text" class="md-input">{{$training->text}}</textarea>
                        </div>
                        <div class="uk-form-row">
                            <label>Отчет тренера</label>
                            <textarea rows="3" name="report" class="md-input">{{$training->report}}</textarea>
                        </div>
                        <div class="uk-form-row">
                            <input type="checkbox" name="all" value="1" data-switchery id="switch_demo_1" />
                            <label for="switch_demo_1" class="inline-label">Применить ко всей группе</label>
                            <span class="uk-form-help-block">Изменения применятся ко всей созданной группе тренировок и касаются времени и группы</span>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-form-file md-btn md-btn-block md-btn-small md-btn-primary">
                                Прикрепить видео тренировки
                                <input name="video" type="file">
                            </div>
                            @if($training->video)
                            <video src="/storage/{{$training->video}}" controls="true"></video>
                            @endif
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-form-file md-btn md-btn-block md-btn-small md-btn-primary">
                                Прикрепить конспект
                                <input name="conspect" type="file">
                            </div>
                            @if($training->conspect)
                            <a href="/storage/{{$training->video}}" target="_blank">посмотреть</a>
                            @endif
                        </div>
                        <div class="uk-form-row">
                            <button class="md-btn md-btn-primary">Сохранить</button>
                        </div>
                    </form>
                    <form action="{{route('admin.trainings.destroy', $training->id)}}" class="confirmed" method="post">
                        @csrf
                        @method('delete')
                        <button class="md-btn md-btn-small md-btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="uk-width-large-1-3">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_c uk-margin-medium-bottom">Записавшиеся</h3>
                    <p class="uk-text-muted uk-margin-medium-bottom">По абонементу</p>
                    <form action="{{route('admin.trainings.checkUsers', $training->id)}}" class="confirmed" data-text="Будте внимательны, изменить эти данные повторно нельзя">
                        <ul class="md-list md-list-addon uk-margin-bottom">
                            @foreach($training->children as $item)
                            <li>
                                <div class="md-list-addon-element">
                                    <input @if($item->pivot->was) checked @endif @if($training->closed) disabled @endif type="checkbox" name="usersIds[]" value="{{$item->id}}" data-md-icheck />
                                </div>
                                <div class="md-list-content">
                                    <span class="md-list-heading">{{$item->name}}</span>
                                    <span class="uk-text-small uk-text-muted"></span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <p class="uk-text-muted">Пробные</p>
                        <ul class="md-list md-list-addon uk-margin-bottom">
                            @foreach($training->temp_users as $item)
                            <li>
                                <div class="md-list-addon-element">
                                    <input @if($item->was) checked @endif @if($training->closed) disabled @endif  type="checkbox" name="tempIds[]" value="{{$item->id}}" data-md-icheck />
                                </div>
                                <a href="{{route('admin.leads.edit', $item->lead->id)}}" class="md-list-content">
                                    <span class="md-list-heading">{{$item->name}}</span>
                                    <span class="uk-text-small uk-text-muted">Лид #{{$item->lead->id}} <i class="md-icon md-icon-phone"></i> {{$item->lead->phone}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @if(!$training->closed)<button class="md-btn md-btn-primary md-btn-small">Отметить прибываших</button>@endif
                    </form>
                </div>
            </div>
        </div>
        <div class="uk-width-large-1-3">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_c uk-margin-medium-bottom">Тренировки этой группы</h3>
                    <ul class="md-list">
                        @foreach($trainings as $item)
                        <li>
                            <a href="{{route('admin.trainings.edit', $item->id)}}" class="md-list-content">
                                <span class="md-list-heading">{{$item->date}}</span>
                                @if($item->trainer_id)
                                <span class="uk-badge uk-badge-success uk-width-1-1">
                                    {{$item->trainer->name}}
                                </span>
                                @else
                                <span class="uk-badge uk-badge-warning uk-width-1-1">
                                    Тренер не назначен
                                </span>
                                @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
