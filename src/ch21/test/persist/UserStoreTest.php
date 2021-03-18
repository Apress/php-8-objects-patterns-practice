<?php
declare(strict_types=1);

namespace userthing\persist;

use PHPUnit\Framework\TestCase;

class UserStoreTest extends TestCase
{
    private $store;

    protected function setUp(): void
    {
        $this->store = new UserStore();
    }

    public function testAddUserShortPass2(): void
    {
        try {
            $this->store->addUser("bob williams", "bob@example.com", "ff");
            $this->assertEquals("bob williams", $this->store->getUser()['name']);
        } catch (\Exception $e) {
            $this->assertEquals("Password must have 5 or more letters", $e->getMessage());
            return;
        }

        $this->fail("Short password exception expected");
    }

    public function testAddUserShortPass(): void
    {
        $this->expectException('\\Exception');
        $this->store->addUser("bob williams", "a@b.com", "ff");
        $this->fail("Short password exception expected");
    }

    public function testAddUserDuplicate(): void
    {
        try {
            $ret = $this->store->addUser("bob williams", "a@b.com", "123456");
            $ret = $this->store->addUser("bob stevens", "a@b.com", "123456");
            self::fail("Exception should have been thrown");
        } catch (\Exception $e) {
            $const = $this->logicalAnd(
                //$this->logicalNot( $this->contains("bob stevens")),
                $this->isType('object')
            );
            self::AssertThat($this->store->getUser("a@b.com"), $const);
        }
    }

// UserStoreTest

/* listing 18.19 */
    public function testGetUser(): void
    {
        $this->store->addUser("bob williams", "a@b.com", "12345");
        $user = $this->store->getUser("a@b.com");
        $this->assertEquals($user->getMail(), "a@b.com");
    }
/* /listing 18.19 */
}
