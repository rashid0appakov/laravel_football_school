@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <h2></h2>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"></span><span class="sub-heading" id="user_edit_position"></span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <strong>Название:</strong>
                            <br>
                            {{ $group->name }}
                            <br>
                            <strong>Клуб:</strong>
                            <br>
                            {{ $group->club->name }}
                            <br>
                            <strong>Роль:</strong>
                            <br>
                            {{ $group->spec->name }}
                            <br>
                            <strong>Уровень:</strong>
                            <br>
                            {{ $group->level->name }}
                            <br>
                            <strong>Возраст:</strong>
                            <br>
                            {{ $group->age_start }} - {{ $group->age_end }}
                            <br>
                            <strong>Площадь на группу:</strong>
                            <br>
                            {{ $group->area_on_group }}
                            <br>
                            @if($group->available)
                            <strong>группа тренировок доступна</strong>
                            <br>
                            @endif
                            @if($group->individual_training)
                                <strong>группа создана для индивид. тренировок</strong>
                                <br>
                            @endif
                            <br><br>
                            <a href="/admin/groups" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                Назад
                            </a>
                        </div>
                    </div>
                </div>
    </div>

@stop
