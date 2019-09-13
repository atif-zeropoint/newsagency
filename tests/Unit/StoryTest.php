<?php

namespace Tests\Unit;

use App\Comment;
use App\Story;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_story_can_add_comments()
    {
        $story = factory(Story::class)->create();

        $data = [
            'detail' => $this->faker->paragraph,
            'author' => $this->faker->name,
        ];

        $response = $story->addComment($data);

        $this->assertInstanceOf(Comment::class, $response);
        $this->assertCount(1, Comment::all());

        $this->assertDatabaseHas('comments', $data);
    }
}
