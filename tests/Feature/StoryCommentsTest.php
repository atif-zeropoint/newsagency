<?php

namespace Tests\Feature;

use App\Comment;
use App\Story;
use App\User;
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

        $story      = Story::create($this->data());
        $attributes = [
            'detail'    => $this->faker->paragraph(30),
            'writer_id' => factory(User::class)->create()->id,
        ];

        $this->post($story->path() . '/comments', $attributes)->assertOk();

        $this->assertCount(1, Comment::all());

    }

    public function data()
    {
        return [
            'title'       => $this->faker->text,
            'description' => $this->faker->paragraph,
            'author_id'   => factory(User::class)->create()->id,
            'published'   => true,
        ];
    }

}
