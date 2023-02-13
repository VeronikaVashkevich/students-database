@extends('layouts.form')

@section('formTitle', 'Добавить слушателя')

@section('content')

<script>
    $(document).ready(function () {
        $('#courses').selectpicker();  
    })
</script>

<form method="POST" action="{{ route('students.store') }}">
    @csrf

    <div class="row mb-3">
        <label for="full_name" class="col-md-4 col-form-label text-md-end">ФИО</label>

        <div class="col-md-6">
            <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" autofocus>

            @error('full_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="organization" class="col-md-4 col-form-label text-md-end">Направившая организация</label>

        <div class="col-md-6">
            <select id="organization" class="form-select @error('organization') is-invalid @enderror" name="organization">
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                @endforeach
            </select>

            @error('organization')
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