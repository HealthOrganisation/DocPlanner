<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_post()
    {
        $post = Post::create([
            'title' => 'Test Title',
            'content' => 'Test Content',
            'author_id' => 1,
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Title',
        ]);
    }
}
