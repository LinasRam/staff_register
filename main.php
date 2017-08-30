<?php

require 'autoload.php';
require 'settings.php';

use src\Communicators\UserCommunicator;

$userCommunicator = new UserCommunicator();
$userCommunicator->run();
