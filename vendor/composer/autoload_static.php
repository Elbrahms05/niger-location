<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit963f5d54762e775b022279a8b50c879f
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Elbrahms\\NigerLocation\\Tests\\' => 29,
            'Elbrahms\\NigerLocation\\Database\\Factories\\' => 42,
            'Elbrahms\\NigerLocation\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Elbrahms\\NigerLocation\\Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
            1 => __DIR__ . '/../..' . '/tests',
        ),
        'Elbrahms\\NigerLocation\\Database\\Factories\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/database/factories',
        ),
        'Elbrahms\\NigerLocation\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit963f5d54762e775b022279a8b50c879f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit963f5d54762e775b022279a8b50c879f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit963f5d54762e775b022279a8b50c879f::$classMap;

        }, null, ClassLoader::class);
    }
}
