@extends('layouts.app')

@section('content')

    <div class="mb-3 d-flex align-items-center">
        <h2>Слушатели</h2>

        <a href="{{ route('students.create') }}" class="ms-3 btn btn-primary">Создать</a>
    </div>

    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Группа</th>
                <th scope="col">Курсы</th>
                <th scope="col">Дата начала обучения</th>
                <th scope="col">Дата конца обучения</th>
                <th scope="col">Организация</th>
                <th scope="col">Прмиечание</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="student">
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->group->name }}</td>
                    <td>
                        @foreach ($student->courses as $course)
                            {{ $course->name }} <br />
                        @endforeach
                    </td>
                    <td>{{ date('d.m.Y', strtotime($student->date_start_study)) }}</td>
                    <td>{{ date('d.m.Y', strtotime($student->date_finish_study)) }}</td>
                    <td>{{ $student->organization->name }}</td>
                    <td>{!! nl2br(e($student->note)) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
