<?php

namespace Global4Communications\LaraMenu\MenuObjects;

class MenuHeaderItem extends MenuObject
{
    /**
     * Type of this menu object
     * @var string
     */
    protected $type = 'header';

    /**
     * Text to display in the browser view
     * @var string
     */
    protected $displayText = '';


    public function __construct($text)
    {
        $this->displayText = $text;
    }

    /**
     * Render this object for Bootstrap3
     * @return mixed|string
     */
    protected function renderBS3()
    {
        // todo: add the classes and styles - where is best to put them?

        $this->render .= "<li class='menu-subheading'>";
        $this->render .= $this->displayText . "</li>";

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