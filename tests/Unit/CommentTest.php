<?php

namespace Tests\Unit;

use App\Comment;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test*/
    public function a_comment_has_a_writer()
    {
        $this->withoutExceptionHandling();
        $comment = factory(Comment::class)->create();

        $this->assertDatabaseHas('comments', $comment->toArray());

        $this->assertInstanceOf(User::class, $comment->writer);
    }
}
