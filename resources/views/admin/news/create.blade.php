@extends('admin.layouts.app')

@section('content')
   <div id="page_content_inner" style="padding-bottom: 10px;">
       <form action="/admin/news" method="POST" enctype="multipart/form-data">
      @csrf

        <div class="uk-grid">
            <div class="uk-width-medium-1-2">
                <label for="title1" class="col-md-4 col-form-label text-md-right">Название новости</label>
                <input id="title1" type="text" class="md-input label-fixed form-control " name="title1" value="" required>
            </div>
                <div class="uk-width-medium-1-2">
                    <input type="file" id="input-file-b" name="image" class="dropify" data-default-file=""/>
                </div>
        </div>
        <br><br>
        <div class="uk-width-medium-1-1">
            <h3>Первый блок с текстом</h3>
            <textarea class="md-input autosized ckeditor form-control  @error('textarea1') is-invalid @enderror" name="textarea1" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;"><?=$new->getOriginal('textarea1')?></textarea>
        </div>

        <div class="md-card">
                <div class="md-card-content" style="text-align: center;">
                    <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Добавить новость
                    </button>

                    <a style="float: right" href="/admin/news" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Список новостей
                    </a>
                </div>
        </div>


   </form>
   </div>


@stop
