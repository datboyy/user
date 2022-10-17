<?php
require '../user.php';

$User = (new User())
            ->set(['username' => 'Jane',
                   'email'    => 'Jane@Doe.com']);
