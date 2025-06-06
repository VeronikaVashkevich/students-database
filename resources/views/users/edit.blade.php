@extends('layouts.form')

@section('formTitle', 'Редактировать методиста')

@section('content')

<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('put')

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">ФИО</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="login" class="col-md-4 col-form-label text-md-end">Логин</label>

        <div class="col-md-6">
            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ $user->login }}">

            @error('login')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">Пароль</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</form>

@endsection