<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderIniteabafcc203259c1c0205b6fe836ac627
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

        spl_autoload_register(array('ComposerAutoloaderIniteabafcc203259c1c0205b6fe836ac627', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderIniteabafcc203259c1c0205b6fe836ac627', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticIniteabafcc203259c1c0205b6fe836ac627::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
