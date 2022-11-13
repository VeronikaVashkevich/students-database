@extends('layouts.app')

@section('title', 'Печать отчетов')

@section('content')
    <div class="mb-3 d-flex align-items-center">
        <h2>Печать отчетов</h2>
    </div>

    <div class="mt-3 filters">
        <form action="" method="post">
            @csrf
            <table class="table w-100">
                <tr>
                    <th>Тип фильтра</th>
                    <th>Значение</th>
                    <th></th>
                </tr>
                <tr>
                    <td>Курс</td>
                    <td>
                        <select name="course" id="course" class="form-select">
                            <option value=""></option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Дата начала обучения</td>
                    <td>
                        <input type="date" name="date_start_study" id="dateStartStudy" class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Дата окончания обучения</td>
                    <td>
                        <input type="date" name="date_finish_study" id="dateFinishStudy" class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Слушатель</td>
                    {{-- <td><input type="text" name="full_name" id="fullName" class="form-control"></td> --}}
                    <td>
                        <select name="student" id="student" class="selectpicker" data-live-search="true">
                            <option value=""></option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Группа</td>
                    <td>
                        <select name="group" id="group" class="form-select">
                            <option value=""></option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Направившая организация</td>
                    <td>
                        <select name="organization" id="organization" class="form-select">
                            <option value=""></option>
                            @foreach ($organizations as $organization)
                                <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Вид печати</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="source" id="sourcePdf" value="pdf" checked="checked">
                            <label class="form-check-label" for="sourcePdf">
                                PDF
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="source" id="sourceExcel" value="excel">
                            <label class="form-check-label" for="sourceExcel" >
                                Excel
                            </label>
                        </div>
                    </td>
                    <td><button type="submit" class="btn btn-success" id="printBtn">Печать</button></td>
                </tr>
            </table>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            let form = $('form');

            $('[name="source"]').change(function () {
                $('form').attr('action', '/print-' + $('[name="source"]:checked').val());
            }).change()
        });
    </script>
@endsection
