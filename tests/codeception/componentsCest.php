<?php


namespace Tests\Acceptance;

use Codeception\Attribute\Incomplete;
use Tests\Support\AcceptanceTester;
use Codeception\Attribute\Skip;

class chatNtableCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/components');
    }

    // tests
    public function addToBuild(AcceptanceTester $I)
    {
        //add cpu component to build
        $I->wait(1);
        $I->see('Add to build');
        $I->click('Add to build');
        $I->see('testmaker testcpu');
    }

    /*#[Skip('outdated')]
    public function chatroomMoboProcedure(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->click('#chattail');
        $I->wait(1);
        $I->click('Motherboard');
        $I->wait(1);
        $I->click('testsocket');
        $I->wait(1);
        $I->click('testchipset');
        $I->wait(1);
        $I->click('testramtyp');
        $I->wait(1);
        $I->click('Yes');
        $I->wait(1);
        $I->click('testmobo');
        $I->wait(1);
        $I->see('testmaker testmobo');
    }*/

    public function removeFromBuild(AcceptanceTester $I)
    {
        //remove cpu component from build
        $I->setCookie('CPU', '{%22id%22:%221%22%2C%22maker%20name%22:%22testmaker%22%2C%22series%20name%22:%22testseriesc%22%2C%22socket%20name%22:%22testsocket%22%2C%22name%22:%22testcpu%22%2C%22price%22:%227000%22%2C%22tdp%22:%2265%22%2C%22integrated_gpu%22:%220%22%2C%22supportedmemspeed%22:%223600%22%2C%22supportedmemsize%22:%22126%22%2C%22imgloc%22:%221.jpg%22}');
        $I->amOnPage('/yourbuild');
        $I->wait(1);
        $I->see('testcpu');
        $I->click('Remove');
        $I->dontSee('testcpu');
        $I->wait(1);
        $I->See('It appears that you have removed a component from your list');
    }
}
