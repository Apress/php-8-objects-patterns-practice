<?php

declare(strict_types=1);

namespace popp\ch18\batch03;

use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    private Validator $validator;

    protected function setUp(): void
    {
        $store = new UserStore();
        $store->addUser("bob williams", "bob@example.com", "12345");
        $this->validator = new Validator($store);
    }

    protected function tearDown(): void
    {
    }

/* listing 18.20 */
    public function testValidateCorrectPass(): void
    {
        $this->assertTrue(
            $this->validator->validateUser("bob@example.com", "12345"),
            "Expecting successful validation"
        );
    }
/* /listing 18.20 */

    public function testValidateFalsePassFirst(): void
    {
        $store = $this->createMock(UserStore::class);

        $user = $this->createMock(User::class);
        $user->expects($this->any())
            ->method("getMail")
            ->will($this->returnValue("bob@example.com"));
        $user->expects($this->any())
            ->method("getPass")
            ->will($this->returnValue("right"));


        $this->validator = new Validator($store);

        $store->expects($this->once())
            ->method('notifyPasswordFailure')
            ->with($this->equalTo('bob@example.com'));

        $store->expects($this->any())
            ->method("getUser")
            ->will($this->returnValue($user));

        $this->validator->validateUser("bob@example.com", "wrong");
    }

    public function testValidateFalsePass(): void
    {
        $store = $this->createMock(UserStore::class);
        $user = $this->createMock(User::class);
        $user->expects($this->any())
            ->method("getMail")
            ->will($this->returnValue("bob@example.com"));
        $user->expects($this->any())
            ->method("getPass")
            ->will($this->returnValue("right"));

        $this->validator = new Validator($store);

        $store->expects($this->once())
            ->method('notifyPasswordFailure')
            ->with($this->equalTo('bob@example.com'));

        $store->expects($this->any())
            ->method("getUser")
            ->will($this->returnValue($user));

        $this->validator->validateUser("bob@example.com", "wrong");
    }
}
