<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6c3f3a1a2331cf11cf8ee8b94ec0bd49
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6c3f3a1a2331cf11cf8ee8b94ec0bd49::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6c3f3a1a2331cf11cf8ee8b94ec0bd49::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
