<?php

namespace App\Exceptions\Admin;

use Exception;

class UserNotFoundException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('User not found');
    }
}
