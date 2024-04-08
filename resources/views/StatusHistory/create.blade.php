
{{Form::model($task,['route' =>'statusHistory.store', 'method' => 'POST'])}}
@csrf
{{ Form::hidden('task_id', $task) }}
{{Form::select('status',['New'=>'New','Processing'=>'Processing','Done'=>'Done'])}}
{{Form::submit('Изменить статус') }}
{{ Form::close() }}

