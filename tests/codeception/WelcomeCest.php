<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class WelcomeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function home(AcceptanceTester $I)
    {
        //can see home page
        $I->amOnPage('/');
        $I->see('Lorem ipsum');
    }

    public function components(AcceptanceTester $I)
    {
        //can see components page with result from the database
        $I->amOnPage('/components');
        $I->wait(1);
        $I->see('testcpu');
    }

    public function yourbuild(AcceptanceTester $I)
    {
        //can see build page
        $I->amOnPage('/yourbuild');
        $I->see('Your build');
    }

    public function workersLogin(AcceptanceTester $I)
    {
        //can see login page
        $I->amOnPage('/login');
        $I->see('Email address');
    }
}
