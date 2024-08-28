<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Codeception\Util\Locator;
use Codeception\Attribute\Depends;

class imageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'test2@test.com');
        $I->fillField('password', 'test2');
        $I->click('Log in');
        $I->amOnPage('/workspace/images');
    }

    // tests
    public function uploadImage(AcceptanceTester $I)
    {
        //successful upload
        $I->attachFile('file', '3.jpg');
        $I->click('Submit');
        $I->see('3.jpg');
    }

    public function renameImagePage(AcceptanceTester $I)
    {
        //rename button leads to correct url
        $I->click('Rename');
        $I->seeInCurrentUrl('/workspace/images?rename=yes');
    }

    #[Depends('uploadImage')]
    public function renameImage(AcceptanceTester $I)
    {
        //rename function works
        $I->amOnPage('/workspace/images?rename=yes&path=3.jpg');
        $I->fillField('name', '3_renamed.jpg');
        $I->click('Submit');
        $I->see('3_renamed.jpg');
    }

    #[Depends('renameImage')]
    public function deleteImage(AcceptanceTester $I)
    {
        //delete function works
        $I->see('Delete', '//a[contains(@href,"3_renamed.jpg")]');
        $I->click('//a[contains(@href,"delete/3_renamed.jpg")]');
        $I->dontSee('3_renamed.jpg');
    }
}
