@extends('layouts.form')

@section('title', 'Редактировать организацию')

@section('formTitle', 'Редактировать организацию')

@section('content')
<form method="POST" action="{{ route('organizations.update', $organization) }}">
    @csrf
    @method('put')

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">Название</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $organization->name }}" autocomplete="login" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </div>
</form>
@endsection