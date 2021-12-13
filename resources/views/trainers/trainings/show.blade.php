@extends('trainers.layouts.app')

@section('content')

<div id="page_content_inner">
    <div class="md-card">
        <div class="md-card-content">
            <h3 class="heading_c uk-margin-medium-bottom">Настройки тренировки <br><b>{{$training->date}}</b></h3>
            <form action="{{route('trainer.trainings.update', $training->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="uk-form-row">
                    <label>Отчет тренера</label>
                    <textarea rows="3" name="report" class="md-input">{{$training->report}}</textarea>
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
        </div>
    </div>
</div>

@stop
