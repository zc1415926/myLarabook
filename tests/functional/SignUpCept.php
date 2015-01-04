<?php

$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a larabook account');

$I->amOnPage('/');
$I->click('Sign up »');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'JohnDoe');
$I->fillField('Email:', 'JohnDoe@example.com');
$I->fillField('Password:', 'demo');
$I->fillField('Password Confirmation:', 'demo');
$I->click('Sign Up!');

$I->canSeeCurrentUrlEquals('');
$I->see('Welcome to Larabook!');
$I->seeRecord('users', [
    'username' => 'JohnDoe'
]);

$I->assertTrue(Auth::check());