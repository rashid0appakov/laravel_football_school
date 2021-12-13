@extends('parents.layouts.app')

@section('content')
<div id="page_content_inner">
    @if(!$child->group_id)
        Для вашей возростной группы не найдено абонементов
        <a href="{{route('parents.children.edit', $child->id)}}" class="md-btn md-btn-primary">Назад</a>
    @else
        <parents-abonemets :child="{{$child}}"></parents-abonemets>
    @endif
</div>
@stop
