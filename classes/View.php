<?php

class View
{
    protected $_filepath;
    protected $_data;

	public static function factory($file)
	{
		return new View($file);
	}

	protected static function capture($view_filename, $view_data)
	{
		extract((array) $view_data, EXTR_SKIP);

		ob_start();

		try {
			include $view_filename;
		}
		catch (Exception $e) {
			ob_end_clean();
		}

		return ob_get_clean();
	}

	public function __construct($filename)
	{
		$this->_filepath = realpath('views') . '/' . $filename . '.php';
	}

    public function set($key, $value)
	{
		$this->_data[$key] = $value;

		return $this;
	}

	public function render()
	{
		return View::capture($this->_filepath, $this->_data);
	}
}
