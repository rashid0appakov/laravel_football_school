@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <h2>{{ $abonement->name }}</h2>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"></span><span class="sub-heading" id="user_edit_position"></span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            @if($abonement->hide_for_new)
                            <strong>Скрыт для новых клиентов</strong>
                            @endif
                            <br>
                                @foreach($abonement->ab_groups as $ab_group)
                                    {{ $ab_group->club->name }}
                                    | Возраст:
                                    {{ $ab_group->age_start }}
                                    -
                                    {{ $ab_group->age_end }}
                                    |
                                    {{ $ab_group->spec->name }}
                                    |
                                    {{ $ab_group->level->name }}
                                @endforeach
                            <br><br>
                            <a href="/admin/aboniments" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                Назад
                            </a>
                        </div>
                    </div>
                </div>
    </div>

@stop
