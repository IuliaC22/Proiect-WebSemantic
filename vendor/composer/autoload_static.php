<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c40f00712a0c13523cb6ddf5cc8a6e2
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'EasyRdf\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'EasyRdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyrdf/easyrdf/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c40f00712a0c13523cb6ddf5cc8a6e2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c40f00712a0c13523cb6ddf5cc8a6e2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c40f00712a0c13523cb6ddf5cc8a6e2::$classMap;

        }, null, ClassLoader::class);
    }
}
