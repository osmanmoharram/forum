<?php

namespace Tests\Feature\Threads;

use App\Models\Thread;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // $this->withoutExceptionHandling();
    }

    /** @test */
    public function a_user_can_show_a_Thread()
    {
        $thread = create(Thread::class);

        tap(
            $this->get(route('threads.show', $thread->id)),

            function (TestResponse $response) use ($thread) {
                $response->assertOk();
                $response->assertViewIs('threads.show');
                $response->assertSee($thread->title);
                $response->assertSee($thread->body);
            }
        );
    }
}
