@extends('layouts.app')

@section('title', 'Программы повышения квалификации')

@section('content')

<div class="mb-3 d-flex align-items-center ">
    <h2>Программы повышения квалификации</h2>

    <a href="{{ route('professionalDevelopmentPrograms.create') }}" class="ms-3 btn btn-primary">Создать</a>
</div>

    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Вид обучения</th>
                <th scope="col">Дата утверждения ФПК</th>
                <th scope="col">Дата утверждения НМС</th>
                <th scope="col">Дата утверждения ректором</th>
                <th scope="col">Управление</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programs as $program)
                <tr class="search_row @if(strtotime('today -2 years') > strtotime($program->date_approval_rector)) bg-danger bg-opacity-10 @endif">
                    <th scope="row">{{ $program->id }}</th>
                    <td>{{ $program->name }}</td>
                    <td>{{ $namePrograms[$program->education_program] }}</td>
                    <td>{{ date('d.m.Y', strtotime($program->date_approval_faculty)) }}</td>
                    <td>{{ date('d.m.Y', strtotime($program->date_approval_council)) }}</td>
                    <td>{{ date('d.m.Y', strtotime($program->date_approval_rector)) }}</td>
                    <td>
                        <a href="{{ route('professionalDevelopmentPrograms.edit', $program) }}" class="btn btn-success mb-1">Редактировать</a>
                        <form action="{{ route('professionalDevelopmentPrograms.destroy', $program->id) }}" method="post">
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
