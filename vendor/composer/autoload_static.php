<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitabaa24f0ce6349abd7cfc13ec28978ab
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitabaa24f0ce6349abd7cfc13ec28978ab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitabaa24f0ce6349abd7cfc13ec28978ab::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitabaa24f0ce6349abd7cfc13ec28978ab::$classMap;

        }, null, ClassLoader::class);
    }
}
