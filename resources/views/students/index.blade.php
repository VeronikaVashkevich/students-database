@extends('layouts.app')

@section('title', 'Слушатели')

@section('content')

<div class="mb-3 d-flex align-items-center ">
    <h2>Слушатели</h2>

    <a href="{{ route('students.create') }}" class="ms-3 btn btn-primary">Создать</a>
</div>

    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Группа</th>
                <th scope="col">Курс</th>
                <th scope="col">Дата начала обучения</th>
                <th scope="col">Дата конца обучения</th>
                <th scope="col">Организация</th>
                @role('admin')
                    <th scope="col">Примечания</th>
                @endrole
                <th scope="col">Управление</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="search_row">
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->group->name }}</td>
                    <td>{{ $student->course->name }}</td>
                    <td>{{ date('d.m.Y', strtotime($student->date_start_study)) }}</td>
                    <td>{{ date('d.m.Y', strtotime($student->date_finish_study)) }}</td>
                    <td>{{ $student->organization->name }}</td>
                    @role('admin')
                        <td>{!! nl2br(e($student->note)) !!}</td>
                    @endrole
                    <td>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-success mb-1">Редактировать</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
