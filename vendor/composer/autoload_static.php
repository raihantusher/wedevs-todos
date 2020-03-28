<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita893b26c21af2b7746687e0a94b060a8
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Medoo\\' => 6,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Medoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/catfan/medoo/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/WeDevs',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita893b26c21af2b7746687e0a94b060a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita893b26c21af2b7746687e0a94b060a8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}