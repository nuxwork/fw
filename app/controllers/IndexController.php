<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
      $this->view->todos = Todo::find();
    }

}

