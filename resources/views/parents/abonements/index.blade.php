@extends('parents.layouts.app')

@section('content')

    <div id="page_content_inner">

        <h3 class="heading_b uk-margin-bottom"></h3>
        <div class="md-card uk-margin-medium-bottom" style="WIDTH: 50%;">
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-vertical-align" id="select_area">
                            <label for="user_edit_uname_control">Пол</label>
                            <select data-md-selectize name="area_id" id="area_id">
                                @if(count($areas) > 0)
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="uk-vertical-align" id="select_club">
                            <label for="user_edit_uname_control">Пол</label>
                            <select data-md-selectize name="area_id" id="area_id">
                                @if(count($clubs) > 0)
                                    @foreach($clubs as $club)
                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="uk-vertical-align" id="select_club">
                            <label for="user_edit_uname_control">Пол</label>
                            <select data-md-selectize name="area_id" id="area_id">
                                @if(count($clubs) > 0)
                                    @foreach($clubs as $club)
                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
