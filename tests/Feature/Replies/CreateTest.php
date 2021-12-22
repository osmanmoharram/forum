<?php

namespace Tests\Feature\Replies;

use App\Models\{User, Reply};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_reply_to_a_thread()
    {
        $user = create(User::class);
        $reply = make(Reply::class);
        $replies = Reply::all()->count();
        
        tap(
            $this->actingAs($user)->post(route('replies.store'), $reply->toArray()),

            function (TestResponse $response) use ($replies) {
                $this->assertEquals(Reply::all()->count(), $replies + 1);
            }
        );
    }
}