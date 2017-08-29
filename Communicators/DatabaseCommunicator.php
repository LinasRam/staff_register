<?php

namespace Communicators;

use PDO;
use PDOException;
use Person;

/**
 * Class DatabaseCommunicator
 */
class DatabaseCommunicator
{
    /**
     * Inserts person to database.
     *
     * @param Person $person
     * @return mixed
     */
    public function insertPerson($person)
    {
        $query = "INSERT INTO persons (first_name, last_name, email, phone_no_1, phone_no_2, comment) VALUES (:first_name, :last_name, :email, :phone_no_1, :phone_no_2, :comment)";
        $preparedData = [
            'first_name' => $person->getFirstName(),
            'last_name' => $person->getLastName(),
            'email' => $person->getEmail(),
            'phone_no_1' => $person->getPhoneNumber1(),
            'phone_no_2' => $person->getPhoneNumber2(),
            'comment' => $person->getComment(),
        ];

        return $this->executeQuery($query, $preparedData);
    }

    /**
     * Deleted person from database by email.
     *
     * @param string $email
     * @return mixed
     */
    public function deletePersonByEmail($email)
    {
        $query = "DELETE FROM persons WHERE email = :email";
        $preparedData = ['email' => $email];

        return $this->executeQuery($query, $preparedData);
    }

    public function findPersonByEmail($email)
    {
        $query = "SELECT * FROM persons WHERE email = :email";
        $preparedData = ['email' => $email];

        return $this->executeQuery($query, $preparedData, true);
    }

    /**
     * Returns PDO connection.
     *
     * @return PDO
     */
    protected function getConnection()
    {
        $conn = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

    /**
     * Executes query to database with provided prepared data.
     *
     * @param string $query
     * @param array $preparedData
     * @param bool $fetch
     * @return mixed
     */
    protected function executeQuery($query, $preparedData, $fetch = false)
    {
        $result = false;

        try {
            $conn = $this->getConnection();
            $statement = $conn->prepare($query);

            if ($fetch) {
                $statement->execute($preparedData);
                $result = $statement->fetch();
            } else {
                $result = $statement->execute($preparedData);
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;

        return $result;
    }
}