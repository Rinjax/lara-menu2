<?php

namespace Global4Communications\LaraMenu\MenuObjects;

class SubDropdownItem extends MenuObject
{
    /**
     * Type of this menu object
     * @var string
     */
    protected $type = 'sub-dropdown';

    /**
     * Text to display in the browser view
     * @var string
     */
    protected $displayText = '';

    /**
     * Array of items to appear in this dropdown
     * @var array
     */
    public $list = [];


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

        $this->render .= "<li role='presentation' class='dropdown-submenu'>";
        $this->render .= '<a class="" href="#" role="button" aria-haspopup="true" aria-expanded="false">';
        $this->render .= $this->displayText . '</a><ul class="dropdown-menu">';

        foreach($this->list as $item){
            $this->render .= $item->render(3);
        }

        $this->render .= "</ul></li>";

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