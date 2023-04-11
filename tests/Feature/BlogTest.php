<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setUp();
        $this->withExceptionHandling();
    }
    /**
     @test
     */
    public function user_can_all_the_blogs()
    {


        //past/ scene /prepare
        $blog1 = Blog::create(['title' => 'first ever blog']);
        $blog2 = Blog::create(['title' => 'second ever blog']);


        //present / action /act
        $response = $this->get('/blog');

        //future / assertation /assert
        $response->assertStatus(200);
        $response->assertSee($blog1->title);
        $response->assertSee($blog2->title);
    }

    /**
     @test
     */
    public function user_can_visit_a_single_blog()
    {
        //preaper
        $blog = Blog::create(['title' => 'show ever blog']);
        //act
        $res = $this->get('/blog/' . $blog->id);

        //assert
        $res->assertStatus(200);
        $res->assertSee($blog->title);
    }
}
