@extends('layouts.form')

@section('formTitle', 'Добавить информацию о прохождении курса')

@section('content')

    <script>
        $(document).ready(function() {
            $('#courses, #student, #group').selectpicker();

            // $('#saveItem').on('click', function() {
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //     $.ajax({
            //         method: 'POST',
            //         data: $('form').serialize(),
            //         dataType: 'json',
            //         url: '{{ route('storeStudyItem') }}',
            //         success: function(response) {

            //         },
            //         error: function(response) {

            //         }
            //     });
            // });
        });
    </script>

    <form method="POST" action="{{ route('storeStudyItem') }}">
        @csrf

        <div class="row mb-3">
            <label for="student" class="col-md-4 col-form-label text-md-end">Слушатель</label>

            <div class="col-md-6">
                <select id="student" class="@error('student') is-invalid @enderror form-control" data-live-search="true"
                    name="student">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                    @endforeach
                </select>
                @error('student')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="group" class="col-md-4 col-form-label text-md-end">Группа</label>

            <div class="col-md-6">
                <select id="group" class="@error('group') is-invalid @enderror form-control" data-live-search="true"
                    name="group">
                    @foreach ($groups as $group)
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
            <label for="date_start_study" class="col-md-4 col-form-label text-md-end">Дата начала обучения</label>

            <div class="col-md-6">
                <input id="date_start_study" type="date"
                    class="form-control @error('date_start_study') is-invalid @enderror" name="date_start_study">
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
                <input id="date_finish_study" type="date"
                    class="form-control @error('date_finish_study') is-invalid @enderror" name="date_finish_study">
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
                <select id="courses" class="@error('courses') is-invalid @enderror form-control" data-live-search="true"
                    name="course">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button id="saveItem" class="btn btn-primary js-save-item">
                    Сохранить
                </button>
            </div>
        </div>
    </form>

@endsection
