<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> --}}
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <style>
        * {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td, th {
            padding: 3px 10px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
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
</body>
</html>