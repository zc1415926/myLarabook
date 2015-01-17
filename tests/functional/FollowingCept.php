<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook user.');
$I->wantTo('follow other Larabook Usres.');

$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();

$I->click('Brows Users');
$I->click('OtherUser');

//When I follow a user
$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

//When I unfollow that same user
$I->see('Unfollow OtherUser');
$I->click('Unfollow OtherUser');
$I->see('Follow OtherUser');