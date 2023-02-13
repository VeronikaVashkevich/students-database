@extends('layouts.form')

@section('formTitle', 'Редактировать слушателя')

@section('content')

<form method="POST" action="{{ route('students.update', $student) }}">
    @csrf
    @method('put')

    <div class="row mb-3">
        <label for="full_name" class="col-md-4 col-form-label text-md-end">ФИО</label>

        <div class="col-md-6">
            <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ $student->full_name }}" autofocus>

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
                    <option value="{{ $organization->id }}" @if ($student->organization_id == $organization->id) selected @endif>{{ $organization->name }}</option>
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