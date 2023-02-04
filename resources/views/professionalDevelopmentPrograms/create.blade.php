@extends('layouts.form')

@section('formTitle', 'Добавить программу повышения квалификации')

@section('content')

<form method="POST" action="{{ route('professionalDevelopmentPrograms.store') }}">
    @csrf

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">Название</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="educationProgram" class="col-md-4 col-form-label text-md-end">Вид обучения</label>

        <div class="col-md-6">
            <select id="educationProgram" class="form-select @error('education_program') is-invalid @enderror" name="education_program">
                @foreach($programs as $key => $educationProgram)
                    <option value="{{ $key }}">{{ $educationProgram }}</option>
                @endforeach
            </select>

            @error('education_program')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="date_approval_faculty" class="col-md-4 col-form-label text-md-end">Дата утверждения ФПК</label>

        <div class="col-md-6">
            <input id="date_approval_faculty" type="date" class="form-control @error('date_approval_faculty') is-invalid @enderror" name="date_approval_faculty">

            @error('date_approval_faculty')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="date_approval_council" class="col-md-4 col-form-label text-md-end">Дата утверждения НМС</label>

        <div class="col-md-6">
            <input id="date_approval_council" type="date" class="form-control @error('date_approval_council') is-invalid @enderror" name="date_approval_council">

            @error('date_approval_council')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="date_approval_rector" class="col-md-4 col-form-label text-md-end">Дата утверждения ректором</label>

        <div class="col-md-6">
            <input id="date_approval_rector" type="date" class="form-control @error('date_approval_rector') is-invalid @enderror" name="date_approval_rector">

            @error('date_approval_rector')
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