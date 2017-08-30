<?php

namespace src\Person;

class PersonValidator
{
    /**
     * Validates person.
     * @param Person $person
     * @return bool
     */
    public function validate($person)
    {
        $invalidValues = 0;

        if (!$this->validateName($person->getFirstName())) {
            $invalidValues++;
        }
        if (!$this->validateName($person->getLastName())) {
            $invalidValues++;
        }
        if (!$this->validateEmail($person->getEmail())) {
            $invalidValues++;
        }
        if (!$this->validatePhoneNumber($person->getPhoneNumber1())) {
            $invalidValues++;
        }
        if (!$this->validatePhoneNumber($person->getPhoneNumber2())) {
            $invalidValues++;
        }
        if (!$this->validateComment($person->getComment())) {
            $invalidValues++;
        }

        if ($invalidValues > 0) {
            return false;
        }
        return true;
    }

    /**
     * Validates name.
     * @param string $name
     * @return bool
     */
    protected function validateName($name)
    {
        if (empty($name) || preg_match('/[0-9]+/', $name) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name) || strlen($name) > 32) {
            return false;
        }
        return true;
    }

    /**
     * Validates email.
     * @param string $email
     * @return bool
     */
    protected function validateEmail($email)
    {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 32) {
            return false;
        }
        return true;
    }

    /**
     * Validates phone number.
     * @param string $number
     * @return bool
     */
    protected function validatePhoneNumber($number)
    {
        if (empty($number) || !preg_match('/^\+?\d+$/', $number) || strlen($number) > 16) {
            return false;
        }
        return true;
    }

    /**
     * Validates comment.
     * @param string $comment
     * @return bool
     */
    protected function validateComment($comment)
    {
        if (empty($comment) || strlen($comment) > 256) {
            return false;
        }
        return true;
    }
}
