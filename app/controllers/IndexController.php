<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$todos = Todo::find(array(
    		array(
    			//'title' => 'hello'
    		)
    	));
    	foreach ($todos as $todo) {
	    	//$todo->delete();
    	}

      $this->view->todos = Todo::find();
    }

}

