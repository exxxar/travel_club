<?php

namespace Tests\Feature\Http\Controllers;

use App\UserId;
use App\UserTour;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UserTourController
 */
class UserTourControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $userTours = factory(UserTour::class, 3)->create();

        $response = $this->get(route('user-tour.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserTourController::class,
            'store',
            \App\Http\Requests\UserTourStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $UserId = factory(UserId::class)->create();
        $TourInfo = $this->faker->;
        $Comment = $this->faker->;

        $response = $this->post(route('user-tour.store'), [
            'UserId' => $UserId->id,
            'TourInfo' => $TourInfo,
            'Comment' => $Comment,
        ]);

        $userTours = UserTour::query()
            ->where('UserId', $UserId->id)
            ->where('TourInfo', $TourInfo)
            ->where('Comment', $Comment)
            ->get();
        $this->assertCount(1, $userTours);
        $userTour = $userTours->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $userTour = factory(UserTour::class)->create();

        $response = $this->get(route('user-tour.show', $userTour));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserTourController::class,
            'update',
            \App\Http\Requests\UserTourUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $userTour = factory(UserTour::class)->create();
        $UserId = factory(UserId::class)->create();
        $TourInfo = $this->faker->;
        $Comment = $this->faker->;

        $response = $this->put(route('user-tour.update', $userTour), [
            'UserId' => $UserId->id,
            'TourInfo' => $TourInfo,
            'Comment' => $Comment,
        ]);

        $userTour->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($UserId->id, $userTour->UserId);
        $this->assertEquals($TourInfo, $userTour->TourInfo);
        $this->assertEquals($Comment, $userTour->Comment);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $userTour = factory(UserTour::class)->create();

        $response = $this->delete(route('user-tour.destroy', $userTour));

        $response->assertOk();

        $this->assertDeleted($userTour);
    }
}
