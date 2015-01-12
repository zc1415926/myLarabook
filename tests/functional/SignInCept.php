<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook memeber');
$I->wantTo('login to my Larabook account');

$I->SignIn();

$I->seeInCurrentUrl('/status');
$I->see('Welcome back!');
$I->assertTrue(Auth::check());