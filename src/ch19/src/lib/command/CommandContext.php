<?php
/**
 * @license   http://www.example.com Borsetshire Open License
 * @package   command
 */

/**
 * Encapsulates data for passing to, from and between Commands.
 * Commands require disparate data according to context. The
 * CommandContext object is passed to the {@link Command::execute()}
 * method, and contains data in key/value format. The class
 * automatically extracts the contents of the $_REQUEST
 * superglobal.
 *
 * @package command
 * @author  Clarrie Grundie
 * @copyright 2004 Ambridge Technologies Ltd
 */

class CommandContext
{
/**
 * The application name.
 * Used by various clients for error messages, etc.
 * @var string
 */
    public $applicationName;

/**
 * Encapsulated Keys/values.
 * This class is essentially a wrapper for this array
 * @var array
 */
    private $params = [];

/**
 * An error message.
 * @var string
 */
    private $error = "";

    public function __construct($appname)
    {
        $this->params = $_REQUEST;
        $this->applicationName = $appname;
    }

    public function addParam($key, $val)
    {
        $this->params[$key] = $val;
    }

    public function get($key)
    {
        return $this->params[$key];
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }
}
