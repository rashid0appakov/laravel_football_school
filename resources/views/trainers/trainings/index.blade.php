@extends('trainers.layouts.app')

@section('content')
<div id="page_content_inner">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-striped uk-table-hover">
                    <thead>
                    <tr>
                        <th>Дата / Время</th>
                        <th>Группа</th>
                        <th>Обучаемых</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($trainings as $item)
                            <tr>
                                <td>{{ $item->date }} {{ $item->start }}-{{ $item->end }}</td>
                                <td>{{$item->group->age_start}} - {{$item->group->age_end}}</td>
                                <td>{{$item->children->count()}}</td>
                                <td class="uk-text-center">
                                    @if($item->accept == 0)
                                    <form style="display: inline" action="{{route('trainer.trainings.accept', $item->id)}}" method="post">
                                        @csrf
                                        <button class="uk-button-link"><i class="md-icon material-icons">check</i></button>
                                    </form>
                                    <a style="display: inline-block" onclick="$('#cancel-form').attr('action', '/trainer/trainings/{{$item->id}}/cancel')" class="uk-button-link" data-uk-modal="{target:'#cancel'}"><i class="md-icon material-icons">close</i></a>
                                    @elseif($item->accept == 1)
                                    <a style="display: inline-block" href="{{route('trainer.trainings.show', $item->id)}}" class="uk-button-link">к тренировке</a>
                                    @else
                                    {{$item->report}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="uk-modal" id="cancel">
    <div class="uk-modal-dialog">
        <form action="" id="cancel-form" method="post">
            @csrf
            <div class="uk-modal-header">
                <h3 class="uk-modal-title">Укажите причину отказа</h3>
            </div>
            <textarea required name="report" rows="3" class="md-input"></textarea>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="md-btn md-btn-flat uk-modal-close">Отмена</button>
                <button class="md-btn md-btn-flat md-btn-flat-primary">Отказаться</button>
            </div>
        </form>
    </div>
</div>
@stop
