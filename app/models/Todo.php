<?php

class Todo extends ImpObject
{
    public $title;

    public $content;

    public $priority;

    public $beginAt;

    public $endAt;
    
    public $finishedAt;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'todo';
    }

}
