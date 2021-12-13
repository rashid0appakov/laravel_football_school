@extends('managers.layouts.app')

@section('content')

    <div id="page_content_inner">
        <div class="uk-vertical-align-middle">
            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/manager/aboniments/create">
                Добавить абонемент
            </a>
        </div>
        <h4 style="margin-top: 20px;" class="heading_a uk-margin-bottom">Список абонементов</h4>
        <div class="md-card uk-margin-medium-bottom">

            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-striped uk-table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Площадки</th>
                            <th>Число тренировок</th>
                            <th>Цена тренировок</th>
                            <th>Число заморозок</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($abonements) > 0)
                            <?php
                            $i = 1;
                            ?>
                            @foreach($abonements as $abonement)
                                <tr>
                                    <td>
                                        {{ $abonement->name }}
                                    </td>
                                    <td>
                                        @foreach($abonement->ab_groups as $group)
                                        {{ $group->club->name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $abonement->number_workouts }}</td>
                                    <td>{{ $abonement->price_workouts }}</td>
                                    <td>{{ $abonement->number_freezing }}</td>
                                    <td class="uk-text-center">
                                        <a href="/manager/aboniments/{{ $abonement->id }}/edit"><i class="md-icon material-icons"></i></a>
                                        <a href="javascript:void(0);" onclick="return submit_form_abonement({{ $i }})">
                                            <i class="md-icon material-icons"></i>
                                        </a>
                                        <form action="/manager/aboniments/{{ $abonement->id }}" method="POST" id="delete_abonement_{{ $i }}">
                                            @method('DELETE')
                                            @csrf

                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                ?>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop
