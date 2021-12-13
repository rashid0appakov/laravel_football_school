@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <div class="uk-vertical-align-middle">
            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/groups/create">
                Добавить группу
            </a>
        </div>
        <h4 style="margin-top: 20px;" class="heading_a uk-margin-bottom">Список групп</h4>
        @if($errors->any())
            <div class="uk-alert uk-alert-danger" data-uk-alert="">
                <a href="#" class="uk-alert-close uk-close"></a>
                {{$errors->first()}}
            </div>
        @endif
        <div class="md-card uk-margin-medium-bottom">

            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-striped uk-table-hover">
                        <thead>
                        <tr>
                            <th>Тазвание</th>
                            <th>Возраст</th>
                            <th>Клуб</th>
                            <th>Spec</th>
                            <th>Level</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($groups) > 0)
                            <?php
                            $i = 1;
                            ?>
                            @foreach($groups as $group)
                                <tr>
                                    <td>{{ $group->name }}</td>
                                    <td> От {{ $group->age_start }} до {{ $group->age_end }}</td>
                                    <td>
                                        @if($group->club->frozen)
                                            <strong style="color: red">
                                                {{ $group->club->name }}
                                            </strong>
                                        @else
                                            {{ $group->club->name }}
                                        @endif
                                    </td>
                                    <td>{{ $group->spec->name }}</td>
                                    <td>{{ $group->level->name }}</td>
                                    <td class="uk-text-center">
                                        <a href="/admin/groups/{{ $group->id }}/edit"><i class="md-icon material-icons"></i></a>
                                        <a href="/admin/groups/{{ $group->id }}">
                                            <i class="md-icon material-icons"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="return submit_form_group({{ $i }})">
                                            <i class="md-icon material-icons"></i>
                                        </a>
                                        <form action="/admin/groups/{{ $group->id }}" method="POST" id="delete_group_{{ $i }}">
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
