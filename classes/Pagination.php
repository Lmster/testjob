<?php

abstract class Pagination
{
    public static function get_paginator($count, $per_page, $current_page)
    {
        $numpages = ceil($count / $per_page);

        $sort = !empty($_REQUEST['sort'])
            ? 'sort=' . $_REQUEST['sort']
            : '';

        return $numpages > 1
            ? View::factory('pagination')
                ->set('numpages', $numpages)
                ->set('current_page', $current_page)
                ->set('sort', $sort)
                ->render()
            : '';
    }
}