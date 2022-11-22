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
        <label for="date_start_study" class="col-md-4 col-form-label text-md-end">Дата начала обучения</label>

        <div class="col-md-6">
            <input id="date_start_study" type="date" class="form-control @error('date_start_study') is-invalid @enderror" name="date_start_study">

            @error('date_start_study')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="date_finish_study" class="col-md-4 col-form-label text-md-end">Дата окончания обучения</label>

        <div class="col-md-6">
            <input id="date_finish_study" type="date" class="form-control @error('date_finish_study') is-invalid @enderror" name="date_finish_study">

            @error('date_finish_study')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="courses" class="col-md-4 col-form-label text-md-end">Курсы</label>

        <div class="col-md-6">
            <select id="courses" class="@error('courses') is-invalid @enderror form-control" name="courses[]"  multiple="multiple" >
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>

            @error('courses')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="group" class="col-md-4 col-form-label text-md-end">Группа</label>

        <div class="col-md-6">
            <select id="group" class="form-select @error('group') is-invalid @enderror" name="group">
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>

            @error('group')
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