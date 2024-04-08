<?php

namespace App\Http\Controllers;

use App\Models\StatusHistory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusHistoryController extends Controller
{
    public function show(Request $request):View
    {
        $statuses = StatusHistory::where('task_id',$request->id)->get();

        return view('StatusHistory.show',['statuses' => $statuses]);
    }

    public function create(Request $request):View
    {

        return view('StatusHistory.create',['task'=>$request->id]);
    }

    public function store(Request $request): RedirectResponse
    {

        $statusHistory = new StatusHistory();
        $statusHistory->task_id = $request->task_id; // Используем значение из запроса
        $statusHistory->status = $request->status;
        $statusHistory->date = now();
        $statusHistory->save();

        return redirect()->route('tasks.index');
    }

}
