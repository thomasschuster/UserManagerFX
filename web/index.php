<?php

require_once __DIR__ . '/../usermanager/UserManagerKernel.php';

$kernel = new UserManagerKernel('dev', true);
$kernel->handle()->send();
