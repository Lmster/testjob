<?php

class Model
{
    protected $filedata;

    protected $per_page = 3;

    protected $login = 'admin';
    protected $password = '123';

    public static function factory()
    {
        return new Model();
    }

    public function __construct()
    {
        $this->filedata = new Filedata();
    }

    public function get_data()
    {
        $page = $_REQUEST['page'] ?? '';

        $items = $this->filedata->get('data', array());

        $items = array_filter($items);

        $sort = $_REQUEST['sort'] ?? '';
        $desc = $_REQUEST['desc'] ?? '';

        if($sort) {
            $items = $this->sort_items($items, $sort, $desc);
        }

        $paginator = Pagination::get_paginator(count($items), $this->per_page, $page);

        $array = $sort
            ? ($desc
                ? '&#9660;'
                : '&#9650;'
            )
            : '';

        return array(
            'items' => array_slice($items, (max(0, (int) $page - 1)) * $this->per_page, $this->per_page, true),
            'paginator' => $paginator,
            'page' => !empty($page)
                ? '&page=' . $page
                : '',
            'sort' => $sort,
            'desc' => $desc,
            'array' => $array,
        );
    }

    protected function sort_items($items, $sort_key, $desc)
    {
        $index = $numitems = array();

        foreach($items as $numitem => $item)
        {
            $index[] = $item[$sort_key];
            $numitems[] = $numitem;
        }

        if($desc) {
            array_multisort($index, SORT_DESC, $numitems, $items);
        }
        else
        {
            array_multisort($index, $numitems, $items);
        }

        return $items;
    }

    public function get_elem($numelem)
    {
        $data = $this->filedata->get('data', array());

        return !empty($data[$numelem])
            ? $data[$numelem]
            : null;
    }

    public function proc_post()
    {
        $post = $_POST;
        $keys = array_keys($post);
        $method = end($keys);

        if(method_exists($this, $method)) {
            return $this->$method($post);
        }

        return false;
    }

    protected function add($post)
    {
        if(!empty($post['name']) and !empty($post['email']) and !empty($post['text']))
        {
            $data = $this->filedata->get('data');

            $increment = $this->filedata->get('increment', 0);

            $data[$increment++] = array(
                'name' => $this->desinfect($post['name']),
                'email' => $this->desinfect($post['email']),
                'text' => $this->desinfect($post['text']),
                'edited' => null,
                'done' => null,
            );

            $this->filedata->add('data', $data);
            $this->filedata->add('increment', $increment);

            header('location: /');
        }
    }

    protected function edit($post)
    {
        if(Session::instance()->get('logged'))
        {
            $data = $this->filedata->get('data');

            $data[$post['numelem']] = array(
                'name' => $this->desinfect($post['name']),
                'email' => $this->desinfect($post['email']),
                'text' => $this->desinfect($post['text']),
                'edited' => true,
                'done' => (bool) $post['done'],
            );

            $this->filedata->add('data', $data);
        }
    }

    protected function delete($post)
    {
        if(Session::instance()->get('logged'))
        {
            $data = $this->filedata->get('data');

            $data[$post['numelem']] = null;

            $this->filedata->add('data', $data);

            header('location: /');
        }
    }

    protected function login($post)
    {
        if($post['name'] === $this->login and $post['password'] === $this->password) {
            Session::instance()->set('logged', true);
        }
    }

    protected function logout()
    {
        Session::instance()->delete('logged');
    }

    protected function desinfect($str)
    {
        return htmlentities($str);
    }
}
