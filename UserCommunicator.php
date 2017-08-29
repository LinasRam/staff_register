<?php

/**
 * Class UserCommunicator
 * Used for communication with user.
 */
class UserCommunicator
{
    /**
     * Runs dialog for user to communicate.
     */
    public function run()
    {
        do {
            echo "Actions:\n"
                . "register - register a new person\n"
                . "delete - delete a person from the register\n"
                . "find - find a person in the register\n"
                . "import - import persons using CSV file\n"
                . "exit - end program\n";
            echo "\nChoose your action: ";

            $action = trim(fgets(STDIN));

            $this->processAction($action);

            echo "\n----------------------------------------------------------------------------\n";

        } while ($action != 'exit');
    }

    /**
     * Continues communication with user according to provided action.
     *
     * @param string $action
     */
    protected function processAction($action)
    {
        switch ($action) {
            case 'register':
                $this->processRegister();
                break;
            case 'delete':
                $this->processDelete();
                break;
            case 'find':
                $this->processFind();
                break;
            case 'import':
                $this->processImport();
                break;
            case 'exit':
                echo "Program ended.";
                break;
            default:
                echo "Wrong action.";
                break;
        }
    }

    /**
     * Continues communication with user for 'register' action.
     */
    protected function processRegister()
    {
        echo "Enter first name: ";
        $firstName = trim(fgets(STDIN));
        echo "Enter last name: ";
        $lastName = trim(fgets(STDIN));
        echo "Enter email: ";
        $email = trim(fgets(STDIN));
        echo "Enter phone number: ";
        $phoneNumber1 = trim(fgets(STDIN));
        echo "Enter secondary phone number: ";
        $phoneNumber2 = trim(fgets(STDIN));
        echo "Enter comment: ";
        $comment = trim(fgets(STDIN));

        $person = new Person($firstName, $lastName, $email, $phoneNumber1, $phoneNumber2, $comment);

        // @todo: registerPerson($person)
    }

    /**
     * Continues communication with user for 'delete' action.
     */
    protected function processDelete()
    {
        echo "Enter email of person you want to delete: ";
        $email = trim(fgets(STDIN));

        // @todo: deletePersonByEmail($email)
    }

    /**
     * Continues communication with user for 'find' action.
     */
    protected function processFind()
    {
        echo "Enter email of person you want to find: ";
        $email = trim(fgets(STDIN));

        // @todo: findPersonByEmail($email)
    }

    /**
     * Continues communication with user for 'import' action.
     */
    protected function processImport()
    {
        echo "Enter path to CSV file: ";
        $path = trim(fgets(STDIN));

        // @todo: importPersons($path)
    }
}