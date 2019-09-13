<?php

namespace Tests\Feature;

use App\Comment;
use App\Story;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoryCommentsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_story_can_have_many_comments()
    {
        $this->withoutExceptionHandling();

        $story = Story::create($this->data());

        $this->post('/stories/' . $story->id . '/comments', [
            'detail' => $this->faker->paragraph(200),
            'author' => $this->faker->name,
        ])->assertOk();

        $this->assertCount(1, Comment::all());

    }

    public function data()
    {
        return [
            'title'       => $this->faker->text,
            'description' => $this->faker->paragraph,
            'author'      => $this->faker->name,
            'published'   => true,
        ];
    }

}
