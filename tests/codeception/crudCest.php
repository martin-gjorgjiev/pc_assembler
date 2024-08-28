<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Codeception\Attribute\Depends;

class crudCest
{

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'test2@test.com');
        $I->fillField('password', 'test2');
        $I->click('Log in');
        $I->amOnPage('/workspace/maker');
    }

    // tests
    public function crudInsert(AcceptanceTester $I)
    {
        //use crud to enter data then check in database      
        $I->click('Add Record');
        $I->fillField('name', 'crudinsert');
        $I->click('Save and go');
        $I->wait(1);
        $I->seeInCurrentUrl('success');
        $I->seeInDatabase('maker', ['name' => 'crudinsert']);
    }

    #[Depends('crudInsert')]
    public function crudEdit(AcceptanceTester $I)
    {
        //use crud to edit a row then check in database
        try{
            $I->seeInDatabase('maker', ['name' => 'crudinsert']);
            $idnum=$I->grabFromDatabase('maker','id',['name' => 'crudinsert']);
        }catch(\Exception $e){
            echo 'Was not in database ...';
            $I->click('Add Record');
            $I->fillField('name', 'crudinsert');
            $I->click('Save and go');
            $I->wait(1);
            $I->seeInCurrentUrl('success');
            $I->seeInDatabase('maker', ['name' => 'crudinsert']);
            $idnum=$I->grabFromDatabase('maker','id',['name' => 'crudinsert']);
        }
        $I->click('//a[contains(@href,"'.'edit/'.$idnum.'")]');
        $I->fillField('name', 'crudedit');
        $I->click('Update and go');
        $I->wait(1);
        $I->seeInCurrentUrl('success');
        $I->seeInDatabase('maker', ['name' => 'crudedit']);
    }

    #[Depends('crudEdit')]
    public function crudDelete(AcceptanceTester $I)
    {
        //use crud to delete a row then check in database
        try{
            $I->seeInDatabase('maker', ['name' => 'crudedit']);
            $idnum=$I->grabFromDatabase('maker','id',['name' => 'crudedit']);
        }catch(\Exception $e){
            echo 'Was not in database ...';
            $I->click('Add Record');
            $I->fillField('name', 'crudedit');
            $I->click('Save and go');
            $I->wait(1);
            $I->seeInCurrentUrl('success');
            $I->seeInDatabase('maker', ['name' => 'crudedit']);
            $idnum=$I->grabFromDatabase('maker','id',['name' => 'crudedit']);
        }
        $I->click('//a[contains(@onclick,"'.'delete/'.$idnum.'")]');
        $I->wait(1);
        $I->acceptPopup();
        $I->wait(1);
        $I->dontSeeInDatabase('maker', ['name' => 'crudedit']);
    }
}