@extends('layouts.app')

@section('content')

    <div class="md-card" id="login_card">
        <div class="md-card-content large-padding" id="login_form">
            <div class="login_heading">
                <div class="user_avatar"></div>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="uk-form-row">
                    <label for="login_username">Ваша почта</label>
                    <input class="md-input" type="text" id="email" name="email" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="uk-form-row">
                    <label for="login_password">Пароль</label>
                    <input class="md-input" type="password" id="password" name="password" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="uk-margin-medium-top">
                    <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Войти</button>
                </div>
                <div class="uk-margin-top">
                    <a href="#" id="login_help_show" class="uk-float-right">Не можете войти?</a>
                    <span class="icheck-inline">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} data-md-icheck />
                            <label for="login_page_stay_signed" class="inline-label">Запомнить меня</label>
                        </span>
                </div>
            </form>
        </div>
        <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
            <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_b uk-text-success">Не можете войти?</h2>
            <p><a href="#" id="password_reset_show">восстановить пароль</a>.</p>
        </div>
        <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
            <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_a uk-margin-large-bottom">Восстановление пароля</h2>
            <form method="POST" action="{{ route('password.update') }}">
                <div class="uk-form-row">
                    <label for="login_email_reset">Ваш email</label>
                    <input class="md-input" type="text" id="email" name="email" />
                </div>
                <div class="uk-margin-medium-top">
                    <button type="submit" class="md-btn md-btn-primary md-btn-block">Восстановить</button>
                </div>
            </form>
        </div>
        <div class="md-card-content large-padding" id="register_form" style="display: none">
            <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_a uk-margin-medium-bottom">Регистрация родителя</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    <div class="uk-alert uk-alert-success" data-uk-alert="">
                        <a href="#" class="uk-alert-close uk-close"></a>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-success">
                    <div class="uk-alert uk-alert-danger" data-uk-alert="">
                        <a href="#" class="uk-alert-close uk-close"></a>
                        {{ session('error') }}
                    </div>
                </div>
            @endif
            <form method="POST" action="/users/parents/store">
                @csrf
                @if($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
                <div class="uk-form-row">
                    <label for="register_username">Ваше имя</label>
                    <input required class="md-input" type="text" id="name" name="name" />
                </div>
                <div class="uk-form-row">
                    <label for="register_password">Пароль</label>
                    <input required class="md-input" type="password" id="password" name="password" />
                </div>
                <div class="uk-form-row">
                    <label for="register_password_repeat">Повторите пароль</label>
                    <input required class="md-input" type="password" id="password_confirmation" name="password_confirmation" />
                </div>
                <div class="uk-form-row">
                    <label for="register_email">E-mail</label>
                    <input required class="md-input" type="text" id="email" name="email" />
                </div>
                <div class="uk-form-row">
                    <label for="register_email">Телефон</label>
                    <input class="md-input" type="text" id="phone" name="phone" />
                </div>
                <div class="uk-form-row">
                    <label for="register_email">Фамилия ребенка</label>
                    <input required class="md-input" type="text" id="name" name="name" />
                </div>
                <div class="uk-form-row">
                    <label for="register_email">Имя ребенка</label>
                    <input required class="md-input" type="text" id="surname" name="surname" />
                </div>
                <div class="uk-form-row">
                    <label for="register_email">Отчество ребенка</label>
                    <input required class="md-input" type="text" id="patronymic" name="patronymic" />
                </div>
                <div class="uk-form-row">
                    <label for="register_email">Пол</label>
                    <select required data-md-selectize name="gender">
                        <option value="">Выбрать...</option>
                        <option value="Мужской">Мужской</option>
                        <option value="Женский">Женский</option>
                    </select>
                </div>
                <div class="uk-form-row">
                    <input required class="md-input" value="{{old('birthday')}}" type="text" id="kUI_datepicker_a" name="birthday" required />
                </div>
                <div class="uk-form-row">
                    <label for="register_email">Клуб</label>
                    <select required data-md-selectize name="club_id">
                        <option value="">Выбрать...</option>
                        @foreach($clubs as $club)
                            <option value="{{ $club->id }}">{{ $club->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="uk-margin-medium-top">
                    <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
    <div class="uk-margin-top uk-text-center">
        <a href="#" id="signup_form_show">Зарегистрироваться как родитель</a>
    </div>


@endsection
