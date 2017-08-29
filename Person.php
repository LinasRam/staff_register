<?php

/**
 * Class Person
 */
class Person
{
    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $phoneNumber1;

    /**
     * @var string
     */
    protected $phoneNumber2;

    /**
     * @var string
     */
    protected $comment;

    /**
     * Person constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $phoneNumber1
     * @param string $phoneNumber2
     * @param string $comment
     */
    public function __construct($firstName, $lastName, $email, $phoneNumber1, $phoneNumber2, $comment)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumber1 = $phoneNumber1;
        $this->phoneNumber2 = $phoneNumber2;
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber1(): string
    {
        return $this->phoneNumber1;
    }

    /**
     * @param string $phoneNumber1
     */
    public function setPhoneNumber1(string $phoneNumber1)
    {
        $this->phoneNumber1 = $phoneNumber1;
    }

    /**
     * @return string
     */
    public function getPhoneNumber2(): string
    {
        return $this->phoneNumber2;
    }

    /**
     * @param string $phoneNumber2
     */
    public function setPhoneNumber2(string $phoneNumber2)
    {
        $this->phoneNumber2 = $phoneNumber2;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "$this->firstName;$this->lastName;$this->email;$this->phoneNumber1;$this->phoneNumber2;$this->comment;";
    }
}