<?php

class Crypt {
    private static $cipher = 'AES-256-CBC';
    private static $key = 'quiz_app_secret_key_2024_for_encryption';
    
    /**
     * Encrypt plain text password
     */
    public static function encrypt(string $data): string {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$cipher));
        $encrypted = openssl_encrypt($data, self::$cipher, self::$key, 0, $iv);
        $encoded = base64_encode($iv . $encrypted);
        return $encoded;
    }
    
    /**
     * Decrypt encrypted password
     */
    public static function decrypt(string $data): string {
        try {
            $decoded = base64_decode($data);
            $iv_length = openssl_cipher_iv_length(self::$cipher);
            $iv = substr($decoded, 0, $iv_length);
            $encrypted = substr($decoded, $iv_length);
            $decrypted = openssl_decrypt($encrypted, self::$cipher, self::$key, 0, $iv);
            return $decrypted !== false ? $decrypted : $data;
        } catch (Exception $e) {
            // If decryption fails, return original data
            return $data;
        }
    }
}
