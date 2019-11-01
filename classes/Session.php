<?php

class Session
{
    protected $_data = array();

    protected static $init;

    /**
     * @return Session
     */
	public static function instance()
	{
	    if(!Session::$init) {
	        Session::$init = new Session();
        }

		return Session::$init;
	}

	public function __construct($id = null)
	{
        session_start();

        $this->_data = &$_SESSION;
	}

	public function get($key, $default = null)
	{
		return array_key_exists($key, $this->_data)
            ? $this->_data[$key]
            : $default;
	}

	public function get_once($key, $default = null)
	{
		$value = $this->get($key, $default);

		unset($this->_data[$key]);

		return $value;
	}

	public function set($key, $value)
	{
		$this->_data[$key] = $value;

		return $this;
	}


	public function bind($key, & $value)
	{
		$this->_data[$key] = & $value;

		return $this;
	}

	public function delete($key)
	{
		unset($this->_data[$key]);

		return $this;
	}
}
