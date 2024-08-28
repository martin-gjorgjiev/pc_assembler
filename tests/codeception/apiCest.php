<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class apiCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function multipleResults(AcceptanceTester $I)
    {
        //return output with multiple results
        $I->amOnPage('/api/cpu');
        $I->see('testcpu');
    }

    public function returnError(AcceptanceTester $I)
    {
        //return output with error message because post body wasnt given
        $I->amOnPage('/api/cpuquery');
        $I->see('Body parameters are lacking');
    }
}
