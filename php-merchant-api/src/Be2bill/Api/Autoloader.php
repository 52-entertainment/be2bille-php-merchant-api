<?php

/**
 * Autoloader
 *
 * @package Be2bill
 * @author Jérémy Cohen Solal <jeremy@dalenys.com>
 */

/**
 * Handle autoloading
 */
class Be2bill_Api_Autoloader
{
    /**
     * Register a standard autoloader for the Be2bill Client API
     */
    public static function registerAutoloader()
    {
        spl_autoload_register(__CLASS__ . '::autoloader');
    }

    /**
     * The autoload method
     *
     * @param $className string The class name
     */
    public static function autoloader($className)
    {
        $prefix = 'Be2bill_Api';

        $len = strlen($prefix);
        if (strncmp($prefix, $className, $len) !== 0) {
            // skip this autoloader
            return;
        }
        $relative_class = substr($className, $len + 1);
        $file           = str_replace('_', DIRECTORY_SEPARATOR, $relative_class) . '.php';

        require $file;
    }
}
