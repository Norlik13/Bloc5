<?php
use PHPUnit\Framework\TestCase;
use App\Utility\Hash;

class HashTest extends TestCase
{
    public function testGenerateReturnsHash()
    {
        $hash1 = Hash::generate('password');
        $hash2 = Hash::generate('password');
        $this->assertEquals($hash1, $hash2);
    }

    public function testGenerateWithSaltChangesHash()
    {
        $hash1 = Hash::generate('password', 'salt1');
        $hash2 = Hash::generate('password', 'salt2');
        $this->assertNotEquals($hash1, $hash2);
    }

    public function testGenerateSaltLength()
    {
        $salt = Hash::generateSalt(16);
        $this->assertEquals(16, strlen($salt));
    }

    public function testGenerateSaltIsRandom()
    {
        $salt1 = Hash::generateSalt(16);
        $salt2 = Hash::generateSalt(16);
        $this->assertNotEquals($salt1, $salt2);
    }

    public function testGenerateUniqueIsUnique()
    {
        $uid1 = Hash::generateUnique();
        $uid2 = Hash::generateUnique();
        $this->assertNotEquals($uid1, $uid2);
    }
}