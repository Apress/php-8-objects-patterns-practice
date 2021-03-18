<?php

declare(strict_types=1);

/* suspended_listing 18.06 */
namespace popp\ch18\batch02;

use PHPUnit\Framework\TestCase;

class UserStoreTest extends TestCase
{
    private UserStore $store;

    protected function setUp(): void
    {
        $this->store = new UserStore();
    }
/* /suspended_listing 18.06 */

    public function testAddUserShortPass2()
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

/* suspended_listing 18.06 */
/* /suspended_listing 18.06 */

/* listing 18.10 */

    // UserStoreTest

    public function testAddUserDuplicate()
    {
        try {
            $ret = $this->store->addUser("bob williams", "a@b.com", "123456");
            $ret = $this->store->addUser("bob stevens", "a@b.com", "123456");
            $this->fail("Exception should have been thrown");
        } catch (\Exception $e) {
            $const = $this->logicalAnd(
                $this->logicalNot($this->containsEqual("bob stevens")),
                $this->isType('array'),
            );
            $this->AssertThat($this->store->getUser("a@b.com"), $const);
        }
    }
/* /listing 18.10 */

/* listing 18.18 */
    public function testGetUser()
    {
        $this->store->addUser("bob williams", "a@b.com", "12345");
        $user = $this->store->getUser("a@b.com");
        $this->assertEquals($user['mail'], "a@b.com");
        $this->assertEquals($user['name'], "bob williams");
        $this->assertEquals($user['pass'], "12345");
    }
/* /listing 18.18 */
/* suspended_listing 18.06 */
}
/* /suspended_listing 18.06 */
