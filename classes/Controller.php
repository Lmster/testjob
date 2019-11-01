<?php

class Controller
{
    /**
     * @var View
     */
    private $template;

    private $content;

    private function before()
    {
        $this->template = View::factory('template');

        if(!empty($_POST)) {
            Model::factory()->proc_post();
        }
    }

    public function home()
    {
        $this->before();

        $page_data = Model::factory()->get_data();

        $logged = Session::instance()->get('logged');

        $this->content = View::factory('home')
            ->set('data', $page_data)
            ->set('logged', $logged)
            ->render();

        $this->after();
    }

    public function add()
    {
        $this->before();

        $this->content = View::factory('add')
            ->render();

        $this->after();
    }

    public function edit($numelem)
    {
        $this->before();

        $elem = Model::factory()->get_elem($numelem);

        $this->content = View::factory('edit')
            ->set('elem', $elem)
            ->set('numelem', $numelem)
            ->render();

        $this->after();
    }

    private function after()
    {
        $this->template->set('content', $this->content);

        echo $this->template->render();

        echo ob_get_clean();
    }
}
