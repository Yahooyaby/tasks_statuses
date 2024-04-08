{{Form::model($task,['route' => ['tasks.update', $task->id], 'method' => 'PUT'])}}
{{ Form::hidden('id', $task->id) }}
{{ Form::label('task_name', 'Задание') }}
{{ Form::text('task_name', $task->task_name) }}
{{ Form::label('description', 'Описание') }}
{{ Form::textarea('description',$task->description) }}
{{Form::submit('Изменить') }}
{{ Form::close() }}
