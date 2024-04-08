
<div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-12 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-9 text-gray-900 dark:text-gray-100">
                <style>
                    table {
                        border-collapse: collapse; /* Убираем двойные линии */
                        width: 100%; /* Ширина таблицы */
                        border-spacing: 0; /* Расстояние между ячейками */
                    }
                    td {
                        border: 2px solid #333; /* Параметры границ */
                        padding: 1px; /* Поля в ячейках */
                        text-align: center; /* Выравнивание по центру */
                    }
        </style>
<table>
    <tr><td><b>Задание</b></td>
        <td><b>Описание</b></td>
        <td><b>Текущий статус</b></td>
        <td><b>История статусов</b></td>
        <td><b>Изменить</b></td>
        <td><b>Удалить</b></td>
@foreach($tasks as $task)
    <tr>
        <td>
            {{$task->task_name}}
        </td>
    <td>
        {{$task->description}}
    </td>
            <td>
                {{$task->statusHistory->last()->status}}
                {{ Form::model($task,['route' => ['statusHistory.create',$task->id], 'method' => 'GET']) }}
                {{ Form::submit('Изменить статус') }}
                {{ Form::close() }}
            </td>
        <td>
            {{ Form::model($task,['route' => ['statusHistory.show', $task->id], 'method' => 'GET']) }}
            {{ Form::submit('История статуса') }}
            {{ Form::close() }}
        </td>

        <td>
            {{ Form::model($task,['route' => ['tasks.edit', $task], 'method' => 'GET']) }}
            {{ Form::submit('Изменить задание') }}
            {{ Form::close() }}
        </td>
        <td>
            {{ Form::model($task,['route' => ['tasks.destroy', $task->id], 'method' => 'DELETE']) }}
        {{ Form::submit('Удалить задание') }}
            {{ Form::close() }}
        </td>
    </tr>
@endforeach

    {{$tasks->links()}}
</table>
            </div>
        </div>
    </div>
</div>
