<?php

use src\Person\Person;
use src\Person\PersonValidator;

class PersonValidatorTest extends PHPUnit_Framework_TestCase
{
    public function testValidation()
    {
        $personValidator = new PersonValidator();
        $person = new Person('John', 'Doe', 'john@doe.com', '123456789', '987654321', 'comment');

        $this->assertEquals(true, $personValidator->validate($person));
    }
}
