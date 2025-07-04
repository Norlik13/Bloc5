<?php
use PHPUnit\Framework\TestCase;
use App\Controllers\Product;

class ProductControllerTest extends TestCase
{
    public function testIndexActionReturnsView()
    {
        $controller = new Product([]);
        try {
            $controller->indexAction();
            $this->assertTrue(true); // Si aucune exception, le test passe
        } catch (\Throwable $e) {
            $this->fail('indexAction a levé une exception : ' . $e->getMessage());
        }
    }

    public function testShowActionWithId()
    {
        $controller = new Product([]);
        try {
            $controller -> showAction(1);
            $this->assertTrue(true); // Si aucune exception, le test passe
        } catch (\Throwable $e) {
            $this->fail('showAction a levé une exception : ' . $e->getMessage());
        }
    }
}