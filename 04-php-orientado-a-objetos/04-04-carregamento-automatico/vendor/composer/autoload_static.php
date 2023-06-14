<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit31c493515f3bca84fe0d4c4656b7625f
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CoffeeCode\\Uploader\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CoffeeCode\\Uploader\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/uploader/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit31c493515f3bca84fe0d4c4656b7625f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit31c493515f3bca84fe0d4c4656b7625f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit31c493515f3bca84fe0d4c4656b7625f::$classMap;

        }, null, ClassLoader::class);
    }
}