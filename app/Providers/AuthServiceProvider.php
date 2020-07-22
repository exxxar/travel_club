<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensExpireIn(now()->addDays(15));

        Passport::refreshTokensExpireIn(now()->addDays(30));

        Passport::personalAccessTokensExpireIn(now()->addMonths(6));

        Passport::tokensCan([
            'show-personal-info' => 'Просмотр информации о пользователе',
            'create-user-account' => 'Добавление нового ползователя',
            'edit-personal-info' => 'Обновление информации о пользователе',
            'remove-user-account' => 'Удаление пользователя',
        ]);

        Passport::setDefaultScope([
            'show-personal-info',
        ]);

        //
    }
}
