<?php

use src\Person\Person;
use src\Person\PersonValidator;

class PersonValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * Valid person data provider.
     *
     * @return array
     */
    public function validPersonData(): array
    {
        return [
            ['John', 'Doe', 'john@doe.com', '123456789', '987654321', 'comment'],
            ['John', 'Doe', 'j@d.com', '123456789', '987654321', 'comment comment comment'],
            ['John', 'Doe', 'john@doe.com', '+123456789', '987654321', 'comment'],
        ];
    }

    /**
     * Tests valid person data.
     *
     * @dataProvider validPersonData
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $phoneNumber1
     * @param string $phoneNumber2
     * @param string $comment
     */
    public function testValidateValid(string $firstName, string $lastName, string $email, string $phoneNumber1, string $phoneNumber2, string $comment)
    {
        $personValidator = new PersonValidator();
        $person = new Person($firstName, $lastName, $email, $phoneNumber1, $phoneNumber2, $comment);

        $this->assertEquals(true, $personValidator->validate($person));
    }

    /**
     * Valid person data provider.
     *
     * @return array
     */
    public function invalidPersonData(): array
    {
        return [
            ['', '', '', '', '', ''],
            ['', 'Doe', 'john@doe.com', '123456789', '987654321', 'comment'],
            ['John', '', 'john@doe.com', '123456789', '987654321', 'comment'],
            ['John', 'Doe', '', '123456789', '987654321', 'comment'],
            ['John', 'Doe', 'john@doe.com', '', '987654321', 'comment'],
            ['John', 'Doe', 'john@doe.com', '123456789', '', 'comment'],
            ['John', 'Doe', 'john@doe.com', '123456789', '987654321', ''],
            ['abcdefghijklmnopqrstuvwxyzabcdefg', 'Doe', 'john@doe.com', '123456789', '987654321', 'comment'],
            ['John', 'abcdefghijklmnopqrstuvwxyzabcdefg', 'john@doe.com', '123456789', '987654321', 'comment'],
            ['John', 'Doe', 'john', '123456789', '987654321', 'comment'],
            ['John', 'Doe', 'doe.com', '123456789', '987654321', 'comment'],
            ['John', 'Doe', '@doe.com', '123456789', '987654321', 'comment'],
            ['John', 'Doe', 'john@', '123456789', '987654321', 'comment'],
            ['John', 'Doe', 'johnjohnjohnjohn@doedoedoedoedoe.com', '123456789', '987654321', 'comment'],
            ['John', 'Doe', 'john@doe.com', '123456789+', '987654321', 'comment'],
            ['John', 'Doe', 'john@doe.com', '++123456789', '987654321', 'comment'],
            ['John', 'Doe', 'john@doe.com', '12345678901234567', '987654321', 'comment'],
        ];
    }

    /**
     * Tests valid person data.
     *
     * @dataProvider invalidPersonData
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $phoneNumber1
     * @param string $phoneNumber2
     * @param string $comment
     */
    public function testValidateInvalid(string $firstName, string $lastName, string $email, string $phoneNumber1, string $phoneNumber2, string $comment)
    {
        $personValidator = new PersonValidator();
        $person = new Person($firstName, $lastName, $email, $phoneNumber1, $phoneNumber2, $comment);

        $this->assertEquals(false, $personValidator->validate($person));
    }
}
