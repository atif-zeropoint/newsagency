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
    public function only_regisered_users_can_comment()
    {
        $story      = factory(Story::class)->create();
        $attributes = [
            'detail'    => $this->faker->paragraph(30),
            'writer_id' => factory(User::class)->create()->id,
        ];

        $this->post($story->path() . '/comments', $attributes)->assertRedirect('/login');
        $this->assertDatabaseMissing('comments', $attributes);
    }

    /** @test */
    public function a_story_can_have_many_comments()
    {
        $this->withoutExceptionHandling();

        $story      = Story::create($this->data());
        $attributes = [
            'detail' => $this->faker->paragraph(30),
        ];

        $this->be(factory(User::class)->create())
             ->post($story->path() . '/comments', $attributes)->assertRedirect($story->path());

        $this->assertCount(1, Comment::all());

    }

    /** @test */
    public function a_detail_is_required_to_add_a_comment()
    {

        $story = factory(Story::class)->create();

        $attributes = ['detail' => ''];

        $this->be(factory(User::class)->create())
             ->post($story->path() . '/comments', $attributes)
             ->assertSessionHasErrors('detail');

        //$this->assertEquals(0, Comment::all());
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
