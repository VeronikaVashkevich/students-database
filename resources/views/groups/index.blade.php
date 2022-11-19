@extends('layouts.app')

@section('title', 'Группы')

@section('content')

<div class="mb-3 d-flex align-items-center ">
    <h2>Группы</h2>

    <a href="{{ route('groups.create') }}" class="ms-3 btn btn-primary">Создать</a>
</div>

    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название группы</th>
                <th scope="col" colspan="2">Управление</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group)
                <tr class="search_row">
                    <th scope="row">{{ $group->id }}</th>
                    <td>{{ $group->name }}</td>
                    <td><a href="{{ route('groups.edit', $group) }}" class="btn btn-success">Редактировать</a></td>
                    <td>
                        <form action="{{ route('groups.destroy', $group->id) }}" method="post">
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
