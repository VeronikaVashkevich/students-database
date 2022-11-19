@extends('layouts.app')

@section('title', 'Учебные программы')

@section('content')

<div class="mb-3 d-flex align-items-center ">
    <h2>Учебные программы</h2>

    <a href="{{ route('educationPrograms.create') }}" class="ms-3 btn btn-primary">Создать</a>
</div>

    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название учебной программы</th>
                <th scope="col" colspan="2">Управление</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programs as $program)
                <tr class="search_row">
                    <th scope="row">{{ $program->id }}</th>
                    <td>{{ $program->name }}</td>
                    <td><a href="{{ route('educationPrograms.edit', $program) }}" class="btn btn-success">Редактировать</a></td>
                    <td>
                        <form action="{{ route('educationPrograms.destroy', $program->id) }}" method="post">
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
