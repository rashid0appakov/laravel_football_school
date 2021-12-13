@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">

        <!-- statistics (small charts) -->
        <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
            <div class="blocko">
                <div class="ikonochka"><span>1</span></div>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                        <span class="uk-text-muted uk-text-small">Менеджеров</span>
                        <h2 class="uk-margin-remove"><span class="countUpMe">{{ count($managers) }}</span></h2>
                    </div>
                </div>
            </div>
            <div class="blocko">
                <div class="ikonochka"><span>2</span></div>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                        <span class="uk-text-muted uk-text-small">Тренеров</span>
                        <h2 class="uk-margin-remove"><span class="countUpMe">{{ count($trainers) }}</span></h2>
                    </div>
                </div>
            </div><div class="blocko">
                <div class="ikonochka"><span>3</span></div>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                        <span class="uk-text-muted uk-text-small">Родителей</span>
                        <h2 class="uk-margin-remove"><span class="countUpMe">{{ count($parents) }}</span></h2>
                    </div>
                </div>
            </div><div class="blocko">
                <div class="ikonochka"><span>4</span></div>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                        <span class="uk-text-muted uk-text-small">Детей</span>
                        <h2 class="uk-margin-remove"><span class="countUpMe">{{ count($children) }}</span></h2>
                    </div>
                </div>
            </div>
        </div>


        <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
            <div class="blocko">
                <div class="ikonochka"><span>5</span></div>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                        <span class="uk-text-muted uk-text-small">Лиды за день</span>
                        <h2 class="uk-margin-remove"><span class="countUpMe">{{ count($dayLeads) }}</span></h2>
                    </div>
                </div>
            </div>
            <div class="blocko">
                <div class="ikonochka"><span>6</span></div>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                        <span class="uk-text-muted uk-text-small">Лиды за неделю</span>
                        <h2 class="uk-margin-remove"><span class="countUpMe">{{ count($weekLeads) }}</span></h2>
                    </div>
                </div>
            </div><div class="blocko">
                <div class="ikonochka"><span>7</span></div>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                        <span class="uk-text-muted uk-text-small">Лиды за месяц</span>
                        <h2 class="uk-margin-remove"><span class="countUpMe">{{ count($monthLeads) }}</span></h2>
                    </div>
                </div>
            </div>
        </div>


        <!-- circular charts -->

        <!-- tasks -->
        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
            <div class="uk-width-medium-1-2">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-overflow-container">
                            <table class="uk-table">
                                <thead>
                                <tr>
                                    <th class="uk-text-nowrap">Название</th>
                                    <th class="uk-text-nowrap">Цена</th>
                                    <th class="uk-text-nowrap">ID</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="uk-table-middle">
                                        <td class="uk-width-3-10 uk-text-nowrap"><a href="/admin/products/{{ $product->id }}/edit">{{ $product->name }}</a></td>
                                        <td class="uk-width-2-10 uk-text-nowrap">{{ $product->price }}</td>
                                        <td class="uk-width-2-10 uk-text-right uk-text-muted uk-text-small">{{ $product->uuid }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-overflow-container">
                            <table class="uk-table">
                                <thead>
                                <tr>
                                    <th class="uk-text-nowrap">Название</th>
                                    <th class="uk-text-nowrap">Статус</th>
                                    @foreach($tasks as $task)
                                    @if($task->manager)
                                    <th class="uk-text-nowrap">Менеджер</th>
                                    @endif
                                      @endforeach
                                    <th class="uk-text-nowrap uk-text-right">Крайний срок</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr class="uk-table-middle">
                                        <td class="uk-width-3-10 uk-text-nowrap"><a href="/admin/manager/task/{{ $task->id }}">{{ $task->title }}</a></td>
                                        <td class="uk-width-2-10 uk-text-nowrap">{{ $task->status->name }}</td>
                                        @if($task->manager)
                                        <td class="uk-width-2-10 uk-text-nowrap"><a href="/admin/users/managers/show-manager/{{ $task->manager->id }}">{{ $task->manager->name }}</a></td>
                                        @endif
                                        <td class="uk-width-2-10 uk-text-right uk-text-muted uk-text-small">{{ $task->deadline }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
            <div class="uk-width-medium-1-2">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-overflow-container">
                            <table class="uk-table">
                                <thead>
                                <tr>
                                    <th class="uk-text-nowrap">Название</th>
                                    <th class="uk-text-nowrap">Сумма</th>
                                    <th class="uk-text-nowrap">ID</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($purchases as $purchase)
                                    <tr class="uk-table-middle">
                                        <td class="uk-width-3-10 uk-text-nowrap"><a href="/admin/products/{{ $purchase->product->id }}/edit">{{ $purchase->product->name }}</a></td>
                                        <td class="uk-width-2-10 uk-text-nowrap">{{ $purchase->product->price }}</td>
                                        <td class="uk-width-2-10 uk-text-right uk-text-muted uk-text-small">{{ $product->uuid }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
            </div>
        </div>



        <!-- info cards -->


        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-large-1-3">
                <div class="md-card">
                    <div class="md-card-content">
                        <ul class="md-list md-list-addon gmap_list" id="map_users_list">
                            <h4>Последние тренеры</h4>
                            @if(count($trainers) > 0)
                                @foreach($trainers as $trainer)
                                    <li style="margin-left: 0px;">
                                        <div class="md-list-content">
                                            <span class="md-list-heading">{{ $trainer->name }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-large-1-3">
                <div class="md-card">
                    <div class="md-card-content">
                        <ul class="md-list md-list-addon gmap_list" id="map_users_list">
                            <h4>Последние родители</h4>
                            @if(count($parents) > 0)
                                @foreach($parents as $parent)
                                    <li style="margin-left: 0px;">
                                        <div class="md-list-content">
                                            <span class="md-list-heading">{{ $parent->user->name }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-large-1-3">
                <div class="md-card">
                    <div class="md-card-content">
                        <ul class="md-list md-list-addon gmap_list" id="map_users_list">
                            <h4>Последние дети</h4>
                            @if(count($children) > 0)
                                @foreach($children as $child)
                                    <li style="margin-left: 0px;">
                                        <div class="md-list-content">
                                            <span class="md-list-heading">{{ $child->name }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>

@stop
