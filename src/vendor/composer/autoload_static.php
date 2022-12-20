<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0418eb0c7f796758953013c1e40057c7
{
    public static $classMap = array (
        'Auth' => __DIR__ . '/../..' . '/models/Auth.php',
        'AuthController' => __DIR__ . '/../..' . '/controllers/AuthController.php',
        'ComposerAutoloaderInit0418eb0c7f796758953013c1e40057c7' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit0418eb0c7f796758953013c1e40057c7' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Database' => __DIR__ . '/../..' . '/models/Database.php',
        'Hike' => __DIR__ . '/../..' . '/models/Hikes.php',
        'HikesController' => __DIR__ . '/../..' . '/controllers/HikesController.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit0418eb0c7f796758953013c1e40057c7::$classMap;

        }, null, ClassLoader::class);
    }
}
