<?php

namespace Tests;

use Tests\Support\AcceptanceTester;

class LoginCest 
{    
    public function _before(AcceptanceTester $I)
    {
        //requirements
        $I->amOnPage('/login');
    }

    public function loginSuccessfully(AcceptanceTester $I)
    {
        // write a positive login test
	    $I->fillField('email', 'test2@test.com');
        $I->fillField('password', 'test2');
        $I->click('Log in');
        $I->seeInCurrentUrl('/workspace/cpu');
        $I->see('Log out');
    }
    
    public function logout(AcceptanceTester $I)
    {
        // write a positive logout test
        $I->fillField('email', 'test2@test.com');
        $I->fillField('password', 'test2');
        $I->click('Log in');
        $I->amOnPage('/workspace/cpu');
        $I->click('Log out');
        $I->amOnPage('/workspace/cpu');
        $I->dontSee('Log out');
    }

    public function loginWithInvalidPassword(AcceptanceTester $I)
    {
        // write a negative login test
        $I->fillField('email', 'test@test.com');
        $I->fillField('password', 'test');
        $I->click('Log in');
        $I->amOnPage('/workspace/cpu');
        $I->dontSee('Log out');
    }
}