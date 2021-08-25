<?php


namespace App\Email;

class EmailChecker
{
    public static function checkValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}