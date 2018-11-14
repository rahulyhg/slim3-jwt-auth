<?php

namespace App\Services;

/**
 * Class HashService.
 */
class HashService
{
    const CHARSET = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/\][{}\";:?.>,<!@#$%^&*()-_=+|";

    /**
     * @param int $length optional
     *
     * @return string
     */
    public function generate(int $length = 32): string
    {
        $salt = '';
        for ($x = 0; $x < $length; ++$x) {
            $salt .= self::CHARSET[mt_rand(0, strlen(self::CHARSET) - 1)];
        }

        return $salt;
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function hash(string $string): string
    {
        return hash('sha256', $string);
    }

    /**
     * @param string $givenHash
     * @param string $validHash
     *
     * @return bool
     */
    public function verify(string $givenHash, string $validHash): bool
    {
        return $validHash === $this->hash($givenHash);
    }
}
