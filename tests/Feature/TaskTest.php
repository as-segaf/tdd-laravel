<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

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
        $response->assertStatus(200);
        $response->assertSee($task->title);
    }
}
