<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd0c97d4cbfc0201f3a9ce32ee38cf3cc
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitd0c97d4cbfc0201f3a9ce32ee38cf3cc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd0c97d4cbfc0201f3a9ce32ee38cf3cc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd0c97d4cbfc0201f3a9ce32ee38cf3cc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}