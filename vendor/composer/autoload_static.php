<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit476435ab3927a7c4521226fb6c56bc73
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cptmmr\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cptmmr\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit476435ab3927a7c4521226fb6c56bc73::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit476435ab3927a7c4521226fb6c56bc73::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
