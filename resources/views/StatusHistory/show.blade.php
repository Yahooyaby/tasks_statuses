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
@foreach($statuses as $status)
    <tr>
        <td>{{$status->status}}</td>
    <td>{{$status->date}}</td>
    </tr>
@endforeach
</table>
