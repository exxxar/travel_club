<?php

namespace Tests\Feature\Http\Controllers;

use App\TourId;
use App\UserId;
use App\UserTicket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UserTicketController
 */
class UserTicketControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $userTickets = factory(UserTicket::class, 3)->create();

        $response = $this->get(route('user-ticket.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserTicketController::class,
            'store',
            \App\Http\Requests\UserTicketStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $UserId = factory(UserId::class)->create();
        $TourId = factory(TourId::class)->create();
        $TicketInfo = $this->faker->;
        $TotalPayment = $this->faker->randomFloat(/** double_attributes **/);
        $CurrentPayment = $this->faker->randomFloat(/** double_attributes **/);
        $ContactPhone = $this->faker->word;

        $response = $this->post(route('user-ticket.store'), [
            'UserId' => $UserId->id,
            'TourId' => $TourId->id,
            'TicketInfo' => $TicketInfo,
            'TotalPayment' => $TotalPayment,
            'CurrentPayment' => $CurrentPayment,
            'ContactPhone' => $ContactPhone,
        ]);

        $userTickets = UserTicket::query()
            ->where('UserId', $UserId->id)
            ->where('TourId', $TourId->id)
            ->where('TicketInfo', $TicketInfo)
            ->where('TotalPayment', $TotalPayment)
            ->where('CurrentPayment', $CurrentPayment)
            ->where('ContactPhone', $ContactPhone)
            ->get();
        $this->assertCount(1, $userTickets);
        $userTicket = $userTickets->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $userTicket = factory(UserTicket::class)->create();

        $response = $this->get(route('user-ticket.show', $userTicket));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserTicketController::class,
            'update',
            \App\Http\Requests\UserTicketUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $userTicket = factory(UserTicket::class)->create();
        $UserId = factory(UserId::class)->create();
        $TourId = factory(TourId::class)->create();
        $TicketInfo = $this->faker->;
        $TotalPayment = $this->faker->randomFloat(/** double_attributes **/);
        $CurrentPayment = $this->faker->randomFloat(/** double_attributes **/);
        $ContactPhone = $this->faker->word;

        $response = $this->put(route('user-ticket.update', $userTicket), [
            'UserId' => $UserId->id,
            'TourId' => $TourId->id,
            'TicketInfo' => $TicketInfo,
            'TotalPayment' => $TotalPayment,
            'CurrentPayment' => $CurrentPayment,
            'ContactPhone' => $ContactPhone,
        ]);

        $userTicket->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($UserId->id, $userTicket->UserId);
        $this->assertEquals($TourId->id, $userTicket->TourId);
        $this->assertEquals($TicketInfo, $userTicket->TicketInfo);
        $this->assertEquals($TotalPayment, $userTicket->TotalPayment);
        $this->assertEquals($CurrentPayment, $userTicket->CurrentPayment);
        $this->assertEquals($ContactPhone, $userTicket->ContactPhone);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $userTicket = factory(UserTicket::class)->create();

        $response = $this->delete(route('user-ticket.destroy', $userTicket));

        $response->assertOk();

        $this->assertDeleted($userTicket);
    }
}
