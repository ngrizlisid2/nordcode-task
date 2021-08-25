<?php


namespace App\User;


class PasswordEncoder
{
    /**
     * @param string $password
     * encodes password for Database
     * @return string
     */
    public static function encodePassword(string $password):string
    {
        return hash('SHA256', $password);
    }
}