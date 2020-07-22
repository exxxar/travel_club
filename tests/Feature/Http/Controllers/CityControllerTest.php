<?php

namespace Tests\Feature\Http\Controllers;

use App\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CityController
 */
class CityControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $cities = factory(City::class, 3)->create();

        $response = $this->get(route('city.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CityController::class,
            'store',
            \App\Http\Requests\CityStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $CityId = $this->faker->numberBetween(-10000, 10000);
        $Name = $this->faker->word;
        $Default = $this->faker->boolean;
        $DescriptionUrl = $this->faker->word;
        $IsPopular = $this->faker->boolean;

        $response = $this->post(route('city.store'), [
            'CityId' => $CityId,
            'Name' => $Name,
            'Default' => $Default,
            'DescriptionUrl' => $DescriptionUrl,
            'IsPopular' => $IsPopular,
        ]);

        $cities = City::query()
            ->where('CityId', $CityId)
            ->where('Name', $Name)
            ->where('Default', $Default)
            ->where('DescriptionUrl', $DescriptionUrl)
            ->where('IsPopular', $IsPopular)
            ->get();
        $this->assertCount(1, $cities);
        $city = $cities->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $city = factory(City::class)->create();

        $response = $this->get(route('city.show', $city));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CityController::class,
            'update',
            \App\Http\Requests\CityUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $city = factory(City::class)->create();
        $CityId = $this->faker->numberBetween(-10000, 10000);
        $Name = $this->faker->word;
        $Default = $this->faker->boolean;
        $DescriptionUrl = $this->faker->word;
        $IsPopular = $this->faker->boolean;

        $response = $this->put(route('city.update', $city), [
            'CityId' => $CityId,
            'Name' => $Name,
            'Default' => $Default,
            'DescriptionUrl' => $DescriptionUrl,
            'IsPopular' => $IsPopular,
        ]);

        $city->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($CityId, $city->CityId);
        $this->assertEquals($Name, $city->Name);
        $this->assertEquals($Default, $city->Default);
        $this->assertEquals($DescriptionUrl, $city->DescriptionUrl);
        $this->assertEquals($IsPopular, $city->IsPopular);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $city = factory(City::class)->create();

        $response = $this->delete(route('city.destroy', $city));

        $response->assertOk();

        $this->assertDeleted($city);
    }
}
