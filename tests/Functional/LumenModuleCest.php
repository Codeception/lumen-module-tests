<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use App\Repository\UserRepositoryInterface;
use Laravel\Lumen\Application;
use Tests\FunctionalTester;

final class LumenModuleCest
{
    public function amLoggedAs(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $user = $userRepository->create();
        $I->amLoggedAs($user);
        $I->amOnPage('/secure');
        $I->see('Secure');
        $I->seeAuthentication();
    }

    public function amOnRoute(FunctionalTester $I)
    {
        // Open page by route
        $I->amOnRoute('simple-route');
        $I->seeCurrentUrlEquals('/simple-route');

        // Open page by route with multiple parameters
        $I->amOnRoute('complex-route', ['a', 'b']);
        $I->seeCurrentUrlEquals('/complex-route/a/b');
    }

    public function clearApplicationHandlers(FunctionalTester $I)
    {
        // TODO
    }

    public function dontSeeAuthentication(FunctionalTester $I)
    {
        $I->amOnPage('/secure');
        $I->dontSeeAuthentication();
    }

    public function dontSeeRecord(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $userRepository->create(['email' => 'janedoe@gmail.com']);

        //With model
        $I->dontSeeRecord(User::class, ['email' => 'johndoe@gmail.com']);

        //With table
        $I->dontSeeRecord('users', ['email' => 'johndoe@gmail.com']);
    }

    public function getApplication(FunctionalTester $I)
    {
        $I->assertInstanceOf(Application::class, $I->getApplication());
    }

    public function grabRecord(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $userRepository->create([
            'email' => 'jane_doe@gmail.com',
            'password' => 'password',
            'created_at' => '',
            'updated_at' => '',
        ]);

        // Grab record with table name
        $record = $I->grabRecord('users', ['email' => 'jane_doe@gmail.com']);
        $I->assertTrue(is_array($record));

        // Grab record with model class
        $model = $I->grabRecord(User::class, ['email' => 'jane_doe@gmail.com']);
        $I->assertTrue($model instanceof User);
    }

    public function grabService(FunctionalTester $I)
    {
        $userRepo = $I->grabService(UserRepositoryInterface::class);
        $I->assertInstanceOf(UserRepository::class, $userRepo);
    }

    public function have(FunctionalTester $I)
    {
        $attributes = ['email' => 'jane_doe@gmail.com'];
        $I->have(User::class, $attributes);
        $I->seeRecord(User::class, $attributes);
    }

    public function haveApplicationHandler(FunctionalTester $I)
    {
        //TODO
    }

    public function haveBinding(FunctionalTester $I)
    {
        //TODO
    }

    public function haveContextualBinding(FunctionalTester $I)
    {
        //TODO
    }

    public function haveInstance(FunctionalTester $I)
    {
        //TODO
    }

    public function haveMultiple(FunctionalTester $I)
    {
        //TODO
    }

    public function haveRecord(FunctionalTester $I)
    {
        // With table name
        $id = $I->haveRecord('users', [
            'email' => 'jane_doe@gmail.com',
            'password' => '123456'
        ]);
        $I->seeRecord('users', ['id' => $id, 'email' => 'jane_doe@gmail.com']);

        // With model class
        $I->haveRecord(User::class, [
            'email' => 'johndoe@example.com',
            'password' => '123456'
        ]);
        $I->seeRecord(User::class, ['email' => 'johndoe@example.com']);
    }

    public function haveSingleton(FunctionalTester $I)
    {
        //TODO
    }

    public function logout(FunctionalTester $I)
    {
        // TODO
    }

    public function make(FunctionalTester $I)
    {
        // TODO
    }

    public function makeMultiple(FunctionalTester $I)
    {
        // TODO
    }

    public function seeAuthentication(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $user = $userRepository->create([
            'email' => 'jane_doe@gmail.com',
            'password' => '123456'
        ]);
        $I->amLoggedAs($user);
        $I->amOnPage('/');
        $I->seeRecord(User::class, ['email' => 'jane_doe@gmail.com']);

        $I->seeAuthentication();
    }
    public function seeInSession(FunctionalTester $I)
    {
        // TODO
    }

    public function seeRecord(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $userRepository->create(['email' => 'janedoe@gmail.com']);

        //With model
        $I->seeRecord(User::class, ['email' => 'janedoe@gmail.com']);

        //With table
        $I->seeRecord('users', ['email' => 'janedoe@gmail.com']);
    }

    public function setApplication(FunctionalTester $I)
    {
        // TODO
    }
}
