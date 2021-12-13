@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">

        @if($errors->any())
            <div class="uk-alert uk-alert-danger" data-uk-alert="">
                {{$errors->first()}}
            </div>
        @endif
        @if(\Session::has('success'))
            <div class="uk-alert uk-alert-success" data-uk-alert="">
                {!! \Session::get('success') !!}
            </div>
        @endif

        <div class="uk-vertical-align-middle">
            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/areas/create">
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
                                    @if($area->frozen == 1)
                                    <tr style="background: #9a0808;color:white">
                                        <td>{{ $area->name }}</td>
                                        <td>{{ $area->address }}</td>
                                        <td>{{ $area->rent_price }}</td>
                                        <td>{{ $area->admin }}</td>
                                        <td>{{ $area->phone }}</td>
                                        <td class="uk-text-center">
                                            <a href="/admin/areas/{{ $area->id }}/edit"><i class="md-icon material-icons"></i></a>
                                            <a href="/admin/areas/delete/{{ $area->id }}">
                                                <i class="md-icon material-icons"></i>
                                            </a>
{{--                                            <form action="/admin/areas/{{ $area->id }}" method="POST" id="delete_area_{{ $i }}">--}}
{{--                                                @method('DELETE')--}}
{{--                                                @csrf--}}

{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                    @else
                                        <tr>
                                            <td>{{ $area->name }}</td>
                                            <td>{{ $area->address }}</td>
                                            <td>{{ $area->rent_price }}</td>
                                            <td>{{ $area->admin }}</td>
                                            <td>{{ $area->phone }}</td>
                                            <td class="uk-text-center">
                                                <a href="/admin/areas/{{ $area->id }}/edit"><i class="md-icon material-icons"></i></a>
                                                <a href="/admin/areas/delete/{{ $area->id }}">
                                                    <i class="md-icon material-icons"></i>
                                                </a>
                                                <a href="/admin/areas/{{ $area->id }}">
                                                    <i class="md-icon material-icons"></i>
                                                </a>
                                                {{--                                            <form action="/admin/areas/{{ $area->id }}" method="POST" id="delete_area_{{ $i }}">--}}
                                                {{--                                                @method('DELETE')--}}
                                                {{--                                                @csrf--}}

                                                {{--                                            </form>--}}
                                            </td>
                                        </tr>
                                    @endif
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
