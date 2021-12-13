@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">

        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-content large-padding">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            <div class="uk-width-large-1-2">
                                @foreach($searchPerson['managers'] as $manager)
                                    <div class="uk-grid uk-grid-small">
                                        <strong>Менеджеры</strong>
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">{{ $manager->name }} {{ $manager->surname }}</span>
                                        </div>
                                    </div>
                                @endforeach
                                <hr class="uk-grid-divider">
                                    @foreach($searchPerson['trainer'] as $trainer)
                                        <div class="uk-grid uk-grid-small">
                                            <strong>Тренеры</strong>
                                            <div class="uk-width-large-1-3">
                                                <span class="uk-text-muted uk-text-small">{{ $trainer->name }} {{$trainer->surname}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr class="uk-grid-divider">
                                    @foreach($searchPerson['trainer'] as $client)
                                        <div class="uk-grid uk-grid-small">
                                            <strong>Клиенты</strong>
                                            <div class="uk-width-large-1-3">
                                                <span class="uk-text-muted uk-text-small">{{ $client->name }} {{ $client->surname }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                <hr class="uk-grid-divider uk-hidden-large">
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
