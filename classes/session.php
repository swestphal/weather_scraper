<?php

/**
 * Created by PhpStorm.
 * User: simonewestphal
 * Date: 19.03.16
 * Time: 08:46
 */
class Session
{
    private $signed_in = false;
    public static $message;
    public static $language;
    public $user_id;

    public function __construct()
    {
//        session_start();
//        session_destroy();
//        self::$language = $this->get_language();

    }

    public static function set_message($message)
    {
        if (!empty($message)) {

            self::$message = $_SESSION['message'] = $message;
        }
    }

    public static function check_message()
    {
        if (isset($_SESSION['message'])) {
            return self::$message = ($_SESSION['message']);
        } else {
            self::$message = "";
        }
    }

    public static function get_language()
    {
        // todo implement language checking and delete code below
        if ((!isset($_SESSION['language'])) || (empty($_SESSION['language']))) {
            $_SESSION['language'] = "de";
            self::$language = "de";
            return self::$language;
        } else {
            $_SESSION['language'] = self::$language;
            return self::$language;
        }
    }

    public static function set_language($lang)
    {
        // todo implement language checking and delete code below
        self::$language = $lang;
        $_SESSION['language'] = $lang;
    }


}