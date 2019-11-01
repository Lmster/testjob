<?php

class Filedata
{
    private $_data = null;
    private $file;

    public function __construct() {
        $this->file = 'filedata';
    }

    public function add($key, $data)
    {
        $cache = $this->read_cache();
        $cache[$key] = $data;

        return $this->write_cache($cache);
    }

    public function get($key = null, $default = null)
    {
        $cache = $this->read_cache();

        if($key)
        {
            if(isset($cache[self::_sanitize_id($key)])) {
                return $cache[self::_sanitize_id($key)];
            }

            return $default;
        }

        return $cache
            ? $cache
            : array();
    }

    public function delete($key)
    {
        unset($this->_data[self::_sanitize_id($key)]);

        $this->write_cache($this->_data);
    }

    private function read_cache()
    {
        if(file_exists($this->file)) {
            $this->_data = unserialize(file_get_contents($this->file));
        }

        return $this->_data;
    }

    private function write_cache($data)
    {
        return file_put_contents($this->file, serialize($data));
    }

    protected static function _sanitize_id($id)
    {
        return str_replace(array('/', '\\', ' '), '_', $id);
    }
}
