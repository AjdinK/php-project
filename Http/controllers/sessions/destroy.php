<?php

use Core\Authenticator;

Authenticator::logout();

redirect('/');
exit();
