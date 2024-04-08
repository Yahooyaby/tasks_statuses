<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_tasks_index(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_tasks_store():void
    {
        $response = $this->post('/tasks/store',[
            'id' => '15',
            'task_name' => 'Make order',
            'description' => 'You have 15 minutes'
        ]);


        $this->assertDatabaseHas('tasks',[
            'task_name' => 'Make order'
        ]);

        $this->assertDatabaseCount('tasks',1);
    }

    public function test_tasks_delete():void
    {
        $task = Task::factory()->create([
            'id' => '23'
        ]);

        $this->assertDatabaseHas('tasks',[
            'id' => 23
        ]);

        $this->delete("/tasks/$task->id");

        $this->assertDatabaseMissing('tasks',[
            'id' => 23
        ]);
    }

    public function test_tasks_update():void
    {
        $task = Task::factory()->create([
            'id' => '23',
            'task_name' => 'Make this'
        ]);

        $task->update([
            'task_name' => 'Make that'
        ]);

        $this->assertDatabaseHas('tasks',[
            'task_name' => 'Make that'
        ]);

    }
}
