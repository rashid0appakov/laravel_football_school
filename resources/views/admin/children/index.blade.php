@extends('admin.layouts.app')

@section('content')
<div id="page_content_inner">
{{--    <div class="uk-vertical-align-middle">--}}
{{--        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/children/create">--}}
{{--            Добавить ребенка--}}
{{--        </a>--}}
{{--    </div>--}}

    <h4 style="margin-top: 20px;" class="heading_a uk-margin-bottom">Дети</h4>

    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-striped uk-table-hover">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Отчество</th>
                        <th>Клуб</th>
                        <th>Родитель</th>
                        <th>Возраст</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($children as $child)
                            <tr>
                                <td>{{ $child->name }}</td>
                                <td>{{ $child->surname }}</td>
                                <td>{{ $child->patronymic }}</td>
                                <td>{{ $child->club->name }}</td>
                                <td>{{$child->parent->user->name}}</td>
                                <td>{{$child->age}}</td>
                                <td class="uk-text-center">
                                    <a href="/admin/crm/children/{{ $child->id }}/edit"><i class="md-icon material-icons"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
