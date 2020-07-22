@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @role("tour-manager")
                        Ваша роль "Тур-манагер"
                        @endrole


                        @role("buyer")
                        Ваша роль "Покупатель"
                        @endrole

                        @can("show-personal-info")
                            Вам доступен просмотр пользовательского аккаунта
                        @endcan

                        @can("remove-user-account")
                            Вам доступно удаление пользовательского аккаунта
                        @endcan

                        @can("edit-personal-info")
                            Вам доступно редактирование пользовательского аккаунта
                        @endcan

                        @can("create-user-account")
                            Вам доступно создание пользовательского аккаунта
                        @endcan

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
