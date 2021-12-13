@extends('admin.layouts.app')

@section('content')
<div id="page_content_inner">
    <div class="md-card">
        <div class="md-card-content">
            <h3 class="heading_a">Добавить тренировки</h3>
            <form action="{{route('admin.trainings.store')}}" method="post" class="uk-grid">
                @csrf
                <div>
                    <label for="uk_dp_start">Дата начала</label>
                    <input autocomplete="off" value="{{old('from')}}" class="md-input" name="from" type="text" id="uk_dp_from" data-uk-datepicker>
                </div>
                <div>
                    <label for="uk_dp_end">Дата окончания</label>
                    <input autocomplete="off" value="{{old('to')}}" class="md-input" name="to" type="text" id="uk_dp_to" data-uk-datepicker>
                </div>
                <div>
                    <label for="uk_tp_1">Время начала</label>
                    <input autocomplete="off" value="{{old('start')}}"  class="md-input" name="start" type="text" id="uk_tp_1" data-uk-timepicker>
                </div>
                <div>
                    <label for="uk_tp_1">Время окончания</label>
                    <input autocomplete="off" value="{{old('end')}}"  class="md-input" name="end" type="text" id="uk_tp_2" data-uk-timepicker>
                </div>
                <div>
                    <select data-md-selectize name="group_id">
                        <option value="">Выберите группу</option>
                        @foreach($clubs as $club)
                        <optgroup label="{{$club->name}}">
                            @foreach($club->groups as $group)
                            <option value="{{$group->id}}">{{ $group->age_start }} - {{ $group->age_end }}</option>
                            @endforeach    
                        </optgroup>
                        @endforeach
                        <span class="uk-form-help-block">Default</span>
                    </select>
                </div>
                <div>
                    <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Добавить
                    </button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <schedule-table role="admin"></schedule-table>
</div>
@stop