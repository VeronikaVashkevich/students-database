@extends('layouts.app')

@section('title', 'Слушатели')

@section('content')

<div class="mb-3 d-flex align-items-center ">
    <h2>Слушатели</h2>

    <a href="{{ route('students.create') }}" class="ms-3 btn btn-primary">Создать</a>
    <a href="{{ route('createStudyItem') }}" class="ms-3 btn btn-outline-primary">Добавить информацию о прохождении курсов</a>
</div>

    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                {{--                <th scope="col">Дата конца обучения</th>--}}
                <th scope="col">Организация</th>
                <th scope="col">Информация о прохождении курсов</th>
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
{{--                    <td>{{ date('d.m.Y', strtotime($student->date_start_study)) }}</td>--}}
{{--                    <td>{{ date('d.m.Y', strtotime($student->date_finish_study)) }}</td>--}}
                    <td>{{ $student->organization->name }}</td>
                    <td>
                        @foreach($student->courseStudyItems as $item) 
                            Название курса: {{ $item->course->name }}
                            <br>
                            Группа: {{ $item->group->name }}
                            <br>
                            Срок обучения: {{ date('d.m.Y', strtotime($item->date_start_study)) }} - {{ date('d.m.Y', strtotime($item->date_finish_study)) }}
                            <a href="{{ route('editStudyItem', $item) }}" class="btn btn-outline-info w-50 mt-1">Редактировать</a>
                            <hr>
                        @endforeach
                    </td>
                    @role('admin')
                        <td>{!! nl2br(e($student->note)) !!}</td>
                    @endrole
                    <td>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-success mb-1">Редактировать</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger mb-1">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
