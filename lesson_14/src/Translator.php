<?php

namespace Rubenrl;

class Translator
{
    /** @var array guarda los mendajes */
    protected static $messages = [];

    /**
     * Seteamos los mensajes
     * @param array $messages
     */
    public static function set(array $messages)
    {
        static::$messages = $messages;
    }

    /**
     * Comprobamos si existe el mensaje y lo pasamos
     * @param $key
     * @param array $params
     * @return array|mixed|string|string[]
     */
    public static function get($key, array $params = array())
    {
        if (! static::has($key)) {
            return "[$key]";
        }

        return static::replaceParams(static::$messages[$key], $params);

    }

    /**
     * Comprobamos si existe el mensaje
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return isset(static::$messages[$key]);
    }

    /**
     * Reemplazamos los datos del atacante y el oponente
     * @param $message
     * @param array $params
     * @return array|mixed|string|string[]
     */
    public static function replaceParams($message, array $params)
    {

        foreach ($params as $key => $value)
        {
            $message = str_replace("$key", $value, $message);
        }

        return $message;
    }
}
