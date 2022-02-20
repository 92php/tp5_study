<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit09cc2fa1db36ec959042584759bf6892
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'think\\composer\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'think\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-installer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit09cc2fa1db36ec959042584759bf6892::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit09cc2fa1db36ec959042584759bf6892::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
