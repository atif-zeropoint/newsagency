<?php

namespace Tests\Feature;

use App\Story;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoriesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_add_a_story()
    {
        $this->withoutExceptionHandling();
        $attributes = $this->data();
        $this->post('/stories', $attributes)->assertOk();


        $this->assertCount(1, Story::all());
        $this->assertDatabaseHas('stories', ['title' => $attributes['title']]);
    }

    /** @test */
    public function a_story_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $attributes = $this->data();

        $story = Story::create($attributes);

        $updatedAttribues = array_merge($this->data(), [
            'title'       => 'New title',
            'description' => 'New description',
            'author'      => 'Updated author name',
        ]);

        $this->patch('/stories/' . $story->id . '/update', $updatedAttribues)->assertOk();
        $this->assertDatabaseHas('stories', $updatedAttribues);

    }

    /** @test */
    public function a_story_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $attributes = $this->data();

        $story = Story::create($attributes);

        $this->delete('/stories/' . $story->id . '/destroy')->assertRedirect('/stories');
        $this->assertCount(0, Story::all());
    }


    /** @test */
    public function a_title_is_required()
    {
        $attributes = array_merge($this->data(), ['title' => '']);

        $this->post('/stories', $attributes)
             ->assertSessionHasErrors('title');

        $this->assertCount(0, Story::all());
    }

    /** @test */
    public function a_description_is_required()
    {
        $attributes = array_merge($this->data(), ['description' => '']);

        $this->post('/stories', $attributes)
             ->assertSessionHasErrors('description');

        $this->assertDatabaseMissing('stories', $attributes);
    }

    /** @test */
    public function an_author_is_required()
    {
        $attributes = array_merge($this->data(), ['author' => '']);

        $this->post('/stories', $attributes)
             ->assertSessionHasErrors('author');

        $this->assertDatabaseMissing('stories', $attributes);
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
