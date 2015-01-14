<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('list all users who are registered for Larabook');

$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('bar');