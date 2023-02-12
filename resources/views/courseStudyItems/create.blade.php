@extends('layouts.form')

@section('formTitle', 'Добавить информацию о прохождении курса')

@section('content')

<script>
    $(document).ready(function () {
        $('#courses, #student').selectpicker();
    });

    $('.js-save-item').on('click', function (e) {
        e.preventDefault();

        console.log('sdfds');
        $.ajax({
            method: 'POST',
            data: $('form').serialize(),
            dataType: 'json',
            url: '{{ route('storeStudyItem') }}',
            success: function (response) {

            },
            error: function (response) {

            }
        });
    });
</script>

<form method="POST">
    @csrf

    <div class="row mb-3">
        <label for="full_name" class="col-md-4 col-form-label text-md-end">Инфомрация о прохождении курса</label>

        <div class="col-md-6">
            <select id="student" class="@error('courses') is-invalid @enderror form-control" data-live-search="true" name="student" >
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="date_start_study" class="col-md-4 col-form-label text-md-end">Дата начала обучения</label>

        <div class="col-md-6">
            <input id="date_start_study" type="date" class="form-control @error('date_start_study') is-invalid @enderror" name="date_start_study">
        </div>
    </div>

    <div class="row mb-3">
        <label for="date_finish_study" class="col-md-4 col-form-label text-md-end">Дата окончания обучения</label>

        <div class="col-md-6">
            <input id="date_finish_study" type="date" class="form-control @error('date_finish_study') is-invalid @enderror" name="date_finish_study">
        </div>
    </div>

    <div class="row mb-3">
        <label for="courses" class="col-md-4 col-form-label text-md-end">Курсы</label>

        <div class="col-md-6">
            <select id="courses" class="@error('courses') is-invalid @enderror form-control" data-live-search="true" name="course" >
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="button" class="btn btn-primary js-save-item">
                Сохранить
            </button>
        </div>
    </div>
</form>

@endsection
