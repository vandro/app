<?php

namespace tests\codeception\unit\models;

use dektrium\user\models\User;
use yii\codeception\TestCase;

class UserTest extends TestCase
{

    public $appConfig = '@tests/codeception/_config/unit.php';

    protected function setUp()
    {
        parent::setUp();
    }

    public function testUserLogout()
    {
        $this->assertTrue(\Yii::$app->user->logout());
    }

    public function testUserLogin()
    {
        $identity = User::findIdentity(1);
        $this->assertTrue(\Yii::$app->user->login($identity, 3600));
    }

    public function testNonExistingUserModel()
    {
        $identity = User::findIdentity(99999);
        $this->assertNull($identity);
    }
}
