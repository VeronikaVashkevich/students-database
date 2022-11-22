@extends('layouts.app')

@section('title', 'Направившие организации')

@section('content')

<div class="mb-3 d-flex align-items-center ">
    <h2>Направляющие организации</h2>

    <a href="{{ route('organizations.create') }}" class="ms-3 btn btn-primary">Создать</a>
</div>

    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название направляющей организации</th>
                <th scope="col" colspan="2">Управление</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organizations as $organization)
                <tr class="search_row">
                    <th scope="row">{{ $organization->id }}</th>
                    <td>{{ $organization->name }}</td>
                    <td><a href="{{ route('organizations.edit', $organization) }}" class="btn btn-success">Редактировать</a></td>
                    <td>
                        <form action="{{ route('organizations.destroy', $organization->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            {{-- <button type="submit" class="btn btn-danger">Удалить</button> --}}
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
