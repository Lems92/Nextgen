<?php

<<<<<<< HEAD
<<<<<<< HEAD
it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
=======
=======
>>>>>>> 40fc94a (Initial commit)
namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
