@extends('layouts.app')

@section('title', 'Методисты')

@section('content')

<div class="mb-3 d-flex align-items-center ">
    <h2>Методисты</h2>

    <a href="{{ route('users.create') }}" class="ms-3 btn btn-primary">Создать</a>
</div>

    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Логин</th>
                <th scope="col" colspan="2">Управление</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($methodists as $methodist)
                <tr>
                    <th scope="row">{{ $methodist->id }}</th>
                    <td>{{ $methodist->name }}</td>
                    <td>{{ $methodist->login }}</td>
                    <td><a href="{{ route('users.edit', $methodist) }}" class="btn btn-success">Редактировать</a></td>
                    <td>
                        <form action="{{ route('users.destroy', $methodist->id) }}" method="post">
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
