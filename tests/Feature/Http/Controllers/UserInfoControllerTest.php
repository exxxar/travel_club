<?php

namespace Tests\Feature\Http\Controllers;

use App\UserInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UserInfoController
 */
class UserInfoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $userInfos = factory(UserInfo::class, 3)->create();

        $response = $this->get(route('user-info.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserInfoController::class,
            'store',
            \App\Http\Requests\UserInfoStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $FullName = $this->faker->word;
        $Age = $this->faker->numberBetween(-10000, 10000);
        $Sex = $this->faker->numberBetween(-10000, 10000);
        $Birthday = $this->faker->word;
        $Passport = $this->faker->word;

        $response = $this->post(route('user-info.store'), [
            'FullName' => $FullName,
            'Age' => $Age,
            'Sex' => $Sex,
            'Birthday' => $Birthday,
            'Passport' => $Passport,
        ]);

        $userInfos = UserInfo::query()
            ->where('FullName', $FullName)
            ->where('Age', $Age)
            ->where('Sex', $Sex)
            ->where('Birthday', $Birthday)
            ->where('Passport', $Passport)
            ->get();
        $this->assertCount(1, $userInfos);
        $userInfo = $userInfos->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $userInfo = factory(UserInfo::class)->create();

        $response = $this->get(route('user-info.show', $userInfo));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserInfoController::class,
            'update',
            \App\Http\Requests\UserInfoUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $userInfo = factory(UserInfo::class)->create();
        $FullName = $this->faker->word;
        $Age = $this->faker->numberBetween(-10000, 10000);
        $Sex = $this->faker->numberBetween(-10000, 10000);
        $Birthday = $this->faker->word;
        $Passport = $this->faker->word;

        $response = $this->put(route('user-info.update', $userInfo), [
            'FullName' => $FullName,
            'Age' => $Age,
            'Sex' => $Sex,
            'Birthday' => $Birthday,
            'Passport' => $Passport,
        ]);

        $userInfo->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($FullName, $userInfo->FullName);
        $this->assertEquals($Age, $userInfo->Age);
        $this->assertEquals($Sex, $userInfo->Sex);
        $this->assertEquals($Birthday, $userInfo->Birthday);
        $this->assertEquals($Passport, $userInfo->Passport);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $userInfo = factory(UserInfo::class)->create();

        $response = $this->delete(route('user-info.destroy', $userInfo));

        $response->assertOk();

        $this->assertDeleted($userInfo);
    }
}
