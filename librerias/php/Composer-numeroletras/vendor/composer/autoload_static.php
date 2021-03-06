<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9f33f3181456470d2601c3a602aef87b
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Luecano\\NumeroALetras\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Luecano\\NumeroALetras\\' => 
        array (
            0 => __DIR__ . '/..' . '/luecano/numero-a-letras/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9f33f3181456470d2601c3a602aef87b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9f33f3181456470d2601c3a602aef87b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9f33f3181456470d2601c3a602aef87b::$classMap;

        }, null, ClassLoader::class);
    }
}
