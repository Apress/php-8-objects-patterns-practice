<?php

declare(strict_types=1);

/* listing 18.09 */
namespace popp\ch18\batch02;

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

    public function testValidateCorrectPass(): void
    {
        $this->assertTrue(
            $this->validator->validateUser("bob@example.com", "12345"),
            "Expecting successful validation"
        );
    }

/* /listing 18.09 */
    protected function tearDown(): void
    {
    }


    public function testValidateFalsePassFirst(): void
    {
        $store = $this->createMock(UserStore::class);
        $this->validator = new Validator($store);

/* listing 18.13 */
        $store->expects($this->once())
            ->method('notifyPasswordFailure')
            ->with($this->equalTo('bob@example.com'));
/* /listing 18.13 */

        $store->expects($this->any())
            ->method("getUser")
            ->will($this->returnValue([
                "name" => "bob@example.com",
                "pass" => "right"
            ]));
        $this->validator->validateUser("bob@example.com", "wrong");
    }

    public function testValidateFalsePassFirstVariation1(): void
    {
        $store = $this->createMock(UserStore::class);
        $this->validator = new Validator($store);

/* listing 18.12 */
        $store->expects($this->once())
            ->method('notifyPasswordFailure');
/* /listing 18.12 */

/* listing 18.15 */
        $store->expects($this->any())
            ->method("getUser")
            ->will($this->returnValue([
                "name" => "bob@example.com",
                "pass" => "right"
            ]));
/* /listing 18.15 */

        $this->validator->validateUser("bob@example.com", "wrong");
    }


    public function testValidateFalsePassFirstVariation2(): void
    {
        $store = $this->createMock(UserStore::class);
        $this->validator = new Validator($store);

/* listing 18.14 */
        $store->expects($this->once())
            ->method('notifyPasswordFailure')
            ->with('bob@example.com');
/* /listing 18.14 */

        $store->expects($this->any())
            ->method("getUser")
            ->will($this->returnValue([
                "name" => "bob@example.com",
                "pass" => "right"
            ]));

        $this->validator->validateUser("bob@example.com", "wrong");
    }


/* listing 18.11 */

// ValidatorTest

    public function testValidateFalsePass(): void
    {
        $store = $this->createMock(UserStore::class);
        $this->validator = new Validator($store);

        $store->expects($this->once())
            ->method('notifyPasswordFailure')
            ->with($this->equalTo('bob@example.com'));

        $store->expects($this->any())
            ->method("getUser")
            ->will($this->returnValue([
                "name" => "bob williams",
                "mail" => "bob@example.com",
                "pass" => "right"
            ]));

        $this->validator->validateUser("bob@example.com", "wrong");
    }
/* /listing 18.11 */
/* listing 18.09 */
}
/* /listing 18.09 */
