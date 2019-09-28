<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function a_user_can_read_all_the_tasks()
    {
        //given we have task in the database
        $task = factory('App\Task')->create();

        //when user visits the task page
        $response = $this->get('/tasks');

        //he should be able to reaed the tasks
        $response->assertStatus(200)
            ->assertSee($task->title);
    }

    /**
     * @test
     */
    public function a_user_can_read_a_single_task()
    {
        //given we have task in the database
        $task = factory('App\Task')->create();

        //when user visits the task's URI
        $response = $this->get('/tasks/'.$task->id);

        //he should be able to read the task's details
        $response->assertStatus(200)
            ->assertSee($task->title)
            ->assertSee($task->desctiption);
    }
}
