<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crypt extends Model
{
    public static function encrypt( $string ) {

        $secret_key = 'spora_secret_key';
        $secret_iv = 'spora_secret_iv';
     
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
     
        return base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }

    public static function decrypt( $string ) {

        $secret_key = 'spora_secret_key';
        $secret_iv = 'spora_secret_iv';
     
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
     
        return openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
}
