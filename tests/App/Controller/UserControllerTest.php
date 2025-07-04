<?php
namespace Tests\App\Controller;

use PHPUnit\Framework\TestCase;
use App\Controllers\User;

class UserControllerTest extends TestCase
{
    private function makeController()
    {
        $fakeArg = null;
        return new User($fakeArg);
    }

    public function testLoginActionReturnsView()
    {
        $controller = $this->makeController();
        try {
            $controller->loginAction();
            $this->assertTrue(true); // Si aucune exception, le test passe
        } catch (\Throwable $e) {
            $this->fail('loginAction a levé une exception : ' . $e->getMessage());
        }
    }

    public function testRegisterActionReturnsView()
    {
        $controller = $this->makeController();
        try {
            $controller->registerAction();
            $this->assertTrue(true); // Si aucune exception, le test passe
        } catch (\Throwable $e) {
            $this->fail('registerAction a levé une exception : ' . $e->getMessage());
        }
    }
}