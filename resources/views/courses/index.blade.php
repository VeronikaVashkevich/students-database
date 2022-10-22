@extends('layouts.app')

@section('content')

<div class="mb-3 d-flex align-items-center ">
    <h2>Курсы</h2>

    <a href="{{ route('courses.create') }}" class="ms-3 btn btn-primary">Создать</a>
</div>

    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название курса</th>
                <th scope="col" colspan="2">Управление</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $course->id }}</th>
                    <td>{{ $course->name }}</td>
                    <td><a href="{{ route('courses.edit', $course) }}" class="btn btn-success">Редактировать</a></td>
                    <td>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
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
