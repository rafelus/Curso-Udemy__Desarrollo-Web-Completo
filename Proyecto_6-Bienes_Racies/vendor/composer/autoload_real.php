<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit278c9aa1d5e5ff580fde7f2d3e2b013d
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit278c9aa1d5e5ff580fde7f2d3e2b013d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit278c9aa1d5e5ff580fde7f2d3e2b013d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit278c9aa1d5e5ff580fde7f2d3e2b013d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
