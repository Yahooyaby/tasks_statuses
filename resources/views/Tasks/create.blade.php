{{Form::open(['route'=>'tasks.store','method'=>'POST'])}}
{{ Form::label('task_name', 'Задание') }}
{{ Form::text('task_name') }}
{{ Form::label('description', 'Описание') }}
{{ Form::textarea('description') }}
{{Form::submit('Создать') }}
{{ Form::close() }}
