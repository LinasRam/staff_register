<?php

require 'autoload.php';
require 'settings.php';

use Communicators\UserCommunicator;

$userCommunicator = new UserCommunicator();
$userCommunicator->run();
