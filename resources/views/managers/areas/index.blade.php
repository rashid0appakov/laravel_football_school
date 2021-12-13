@extends('managers.layouts.app')

@section('content')

    <div id="page_content_inner">




        <div class="uk-vertical-align-middle">
            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/manager/areas/create">
                Добавить площадку
            </a>
        </div>
        <h4 style="margin-top: 20px;" class="heading_a uk-margin-bottom">Список площадок</h4>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-striped uk-table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Адрес</th>
                            <th>Стоимость аренды</th>
                            <th>Админ</th>
                            <th>Телефон</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($areas) > 0)
                                <?php
                                    $i = 1;
                                    ?>
                                @foreach($areas as $area)
                                    <tr>
                                        <td>{{ $area->name }}</td>
                                        <td>{{ $area->address }}</td>
                                        <td>{{ $area->rent_price }}</td>
                                        <td>{{ $area->admin }}</td>
                                        <td>{{ $area->phone }}</td>
                                        <td class="uk-text-center">
                                            <a href="/manager/areas/{{ $area->id }}/edit"><i class="md-icon material-icons"></i></a>
{{--                                            <a href="javascript:void(0);" onclick="return submit_form({{ $i }})">--}}
{{--                                                <i class="md-icon material-icons"></i>--}}
{{--                                            </a>--}}
                                            <form action="/manager/areas/{{ $area->id }}" method="POST" id="delete_area_{{ $i }}">
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
