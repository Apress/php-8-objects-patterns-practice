<?php

/* listing 18.05 */
/* listing 18.06 */
namespace popp\ch18\batch01;

use PHPUnit\Framework\TestCase;

class UserStoreTest extends TestCase
{
/* /listing 18.05 */
    private UserStore $store;
/* listing 18.05 */

    protected function setUp(): void
    {
/* /listing 18.05 */
        $this->store = new UserStore();
/* listing 18.05 */
    }

    protected function tearDown(): void
    {
    }

/* /listing 18.05 */
    public function testGetUser(): void
    {
        $this->store->addUser("bob williams", "a@b.com", "12345");
        $user = $this->store->getUser("a@b.com");
        $this->assertEquals("a@b.com", $user['mail']);
        $this->assertEquals("bob williams", $user['name']);
        $this->assertEquals("12345", $user['pass']);
    }
/* /listing 18.06 */
/* listing 18.07 */
    public function testAddUserShortPass(): void
    {
        try {
            $this->store->addUser("bob williams", "bob@example.com", "ff");
        } catch (\Exception $e) {
            $this->assertEquals("Password must have 5 or more letters", $e->getMessage());
            return;
        }

        $this->fail("Short password exception expected");
    }
/* /listing 18.07 */
/* listing 18.08 */
    public function testAddUserShortPassNew(): void
    {
        $this->expectException(\Exception::class);
        $this->store->addUser("bob williams", "bob@example.com", "ff");
    }
/* /listing 18.08 */
/* listing 18.06 */
/* listing 18.05 */
}
/* /listing 18.06 */
