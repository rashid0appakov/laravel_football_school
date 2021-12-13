@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        
        <div class="uk-vertical-align-middle">
            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/clubs/create">
                Добавить клуб
            </a>
        </div>
        <h4 style="margin-top: 20px;" class="heading_a uk-margin-bottom">Список клубов</h4>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-striped uk-table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Менеджер</th>
                            <th>Площадка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($clubs) > 0)
                                <?php
                                    $i = 1;
                                    ?>
                                @foreach($clubs as $club)
                                    <tr>
                                        <td>{{ $club->name }}</td>
                                       <td>
                                        @if($club->manager != null)
                                            {{ $club->manager->name }}
                                        @endif
                                        </td>
                                        <td>
                                        @if($club->area != null)
                                            {{ $club->area->name }}
                                        @endif
                                        </td>
                                        <td class="uk-text-center">
                                            <a href="/admin/clubs/{{ $club->id }}/edit">
                                                <i class="md-icon material-icons"></i>
                                            </a>
                                            <a href="javascript:void(0);" onclick="return submit_form_club({{ $i }})">
                                                <i class="md-icon material-icons"></i>
                                            </a>
                                            <a href="/admin/clubs/{{ $club->id }}">
                                                <i class="md-icon material-icons"></i>
                                            </a>
                                            <form action="/admin/clubs/{{ $club->id }}" method="POST" id="delete_club_{{ $i }}">
                                                @method('DELETE')
                                                @csrf

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach    
                                    @else
                                 @foreach($clubs as $club)    
                                        <tr>
                                            <td>{{ $club->name }}</td>
                                            <td>
                                                @if($club->manager != null)
                                                    {{ $club->manager->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($club->area != null)
                                                    {{ $club->area->name }}
                                                @endif
                                            </td>
                                            <td class="uk-text-center">
                                                <a href="/admin/clubs/{{ $club->id }}/edit"><i class="md-icon material-icons"></i></a>
                                                <a href="javascript:void(0);" onclick="return submit_form_club({{ $i }})">
                                                    <i class="md-icon material-icons"></i>
                                                </a>
                                                <a href="/admin/clubs/{{ $club->id }}">
                                                    <i class="md-icon material-icons"></i>
                                                </a>
                                                <form action="/admin/clubs/{{ $club->id }}" method="POST" id="delete_club_{{ $i }}">
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
