<?php
//
//namespace App;
//
///**
// * Application configuration
// *
// * PHP version 7.0
// */
//class Config
//{
//    public static $DB_HOST = null;
//    public static $DB_NAME = null;
//    public static $DB_USER = null;
//    public static $DB_PASSWORD = null;
//    const SHOW_ERRORS = true;
//
//    public static function init()
//    {
//        self::$DB_HOST = getenv('DB_HOST') ?: 'db';
//        self::$DB_NAME = getenv('DB_NAME') ?: 'vide_grenier_dev';
//        self::$DB_USER = getenv('DB_USER') ?: 'webapplication';
//        self::$DB_PASSWORD = getenv('DB_PASSWORD') ?: '653rag9T';
//    }
//}


namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{
    public static $DB_HOST = null;
    public static $DB_NAME = null;
    public static $DB_USER = null;
    public static $DB_PASSWORD = null;
    const SHOW_ERRORS = true;

    public static function init()
    {
        // Charger les variables depuis .env si le fichier existe
        if (file_exists(dirname(__DIR__) . '/.env')) {
            $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
            $dotenv->load();
        }

        self::$DB_HOST = getenv('DB_HOST');
        self::$DB_NAME = getenv('DB_NAME');
        self::$DB_USER = getenv('DB_USER');
        self::$DB_PASSWORD = getenv('DB_PASSWORD');
    }
}

Config::init();