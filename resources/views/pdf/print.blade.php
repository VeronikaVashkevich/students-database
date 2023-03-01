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

        table {
            width: 100%;
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
                <th scope="col">Организация</th>
                <th scope="col">Информация о прохождении курсов</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="student search_row">
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->organization->name }}</td>
                    <td>
                        @foreach($student->courseStudyItems as $item) 
                            Название курса: {{ $item->course->name }}
                            <br>
                            Категория курсов: {{ $courseCategories[$item->course_category] }}
                            <br>
                            Группа: {{ $item->group->name }}
                            <br>
                            Срок обучения: {{ date('d.m.Y', strtotime($item->date_start_study)) }} - {{ date('d.m.Y', strtotime($item->date_finish_study)) }}                            <hr>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        Количество слушателей: {{ count($students) }}
    </div>
</body>
</html>