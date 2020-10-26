<?php

namespace Global4Communications\LaraMenu\MenuObjects;

class MenuSeparatorItem extends MenuObject
{
    /**
     * Type of this menu object
     * @var string
     */
    protected $type = 'separator';


    public function __construct()
    {

    }

    /**
     * Render this object for Bootstrap3
     * @return mixed|string
     */
    protected function renderBS3()
    {
        $this->render .= "<li role='separator' class='divider'></li>";

        return $this->render;
    }

    /**
     * Render this object for Bootstrap 4
     * @return mixed|void
     */
    protected function renderBS4()
    {
        // TODO: Implement renderBS4() method.
    }

}