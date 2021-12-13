@extends('admin.layouts.app')

@section('content')
   <div id="page_content_inner" style="padding-bottom: 10px;">
       <form action="/admin/news/{{ $news->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method("PUT")
      <div class="uk-grid">
        <input type="hidden" name="news_id" value="{{ $news->id }}">
        <div class="uk-width-medium-1-2">
                <label for="title1" class="col-md-4 col-form-label text-md-right">Название новости</label>
                <input id="title1" type="text" class="md-input label-fixed form-control @error('description') is-invalid @enderror" name="title1" value="{{ $news->title1 }}" required autocomplete="title1" autofocus>
        </div>
        <div class="uk-width-medium-1-2">
            <input type="file" id="input-file-b" name="image" class="dropify" data-default-file="/news/{{ $news->image }}"/>
        </div>
      </div>  
        <br><br>
        <div class="uk-width-medium-1-1">
            <h3>Первый блок с текстом</h3>
            <textarea class="md-input autosized form-control  @error('textarea1') is-invalid @enderror" name="textarea1" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;">{!! $news->textarea1 !!}</textarea>
        </div>

      

        <div class="md-card">
                <div class="md-card-content" style="text-align: center;">
                    <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Сохранить
                    </button>

                    <a style="float: right" href="/admin/news" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Список новостей
                    </a>
                </div>
        </div>


   </form>
   </div>
