@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">

        <div class="uk-grid uk-grid-width-large-1-2 uk-grid-width-xlarge-1-3 uk-grid-medium listNavWrapper" id="contact_list_v2" data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-margin-medium-top">
                <div class="md-card md-card-hover md-card-horizontal">
                    <div class="md-card-head">
                        <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-left'}">
                            <i class="md-icon material-icons">&#xE5D4;</i>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Remove</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-text-center">
                            <img class="md-card-head-avatar" src="assets/img/avatars/avatar_06.png" alt=""/>
                        </div>
                        <h3 class="md-card-head-text uk-text-center">
                            Nathanael                                    <span class="listNavSelector">Conroy</span>
                            <span class="uk-text-truncate">Goodwin-Nienow</span>
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <ul class="md-list">
                            <li>
                                <div class="md-list-content">
                                    <span class="md-list-heading">Info</span>
                                    <span class="uk-text-small uk-text-muted">Recusandae eos repellendus recusandae vero delectus est rerum nihil laboriosam unde voluptatibus maiores.</span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <span class="md-list-heading">Email</span>
                                    <span class="uk-text-small uk-text-muted uk-text-truncate">romaguera.emmet@hotmail.com</span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <span class="md-list-heading">Phone</span>
                                    <span class="uk-text-small uk-text-muted">969-927-0501</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
