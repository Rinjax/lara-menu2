<?php

namespace Global4Communications\LaraMenu\MenuObjects;

abstract class MenuObject
{
    /**
     * Tye of the object
     * @var string
     */
    protected $type = 'abstract';

    /**
     * Array of CSS classes to be applied.
     * @var array
     */
    public $classes = [];

    /**
     * Array of styles to be applied
     * @var array
     */
    public $styles = [];

    /**
     * Laratrust permissions that's allowed this menu item. Pipe separated string.
     * @var array
     */
    public $allow_permissions = null;

    /**
     * Laratrust roles that's allowed this menu item. Pipe separated string.
     * @var array
     */
    public $allow_roles = null;

    /**
     * Laratrust permissions that's denied from this menu item. This will override any allow permissions or roles.
     * Pipe separated string.
     * @var array
     */
    public $deny_permissions = null;

    /**
     * Laratrust roles that's denied form this menu item. This will override any allow permissions or roles.
     * Pipe separated string.
     * @var array
     */
    public $deny_roles = null;

    /**
     * The rendered HTML string.
     * @var string
     */
    protected $render = '';

    /**
     * The render function that turns this object in to the HTML string.
     * @return mixed
     */
    public function render($BSVersion = 3)
    {
        if($this->shouldRender()){
            if($BSVersion == 3) return $this->renderBS3();

            if($BSVersion == 4) return $this->renderBS4();
        }else{
            return null;
        }

    }

    /**
     * Check to see if the user is auth to view this menu item.
     * @return bool
     */
    protected function shouldRender()
    {
        // check if user has items in the dropdown, dont render it if its empty
        if($this->type() == 'dropdown'){
            if(!$this->dropdownHasLinks()){ return false; }
        }

        if($this->allow_roles == null &&
            $this->allow_permissions == null &&
            $this->deny_roles == null &&
            $this->deny_permissions == null
        ) return true;

        if(\Auth::user()->ability($this->deny_roles, $this->deny_permissions)) return false;

        if(\Auth::user()->ability('dev|'.$this->allow_roles, $this->allow_permissions)) return true;
    }

    /**
     * Called from the main render function, renders the HTML for Bootstrap 3
     * @return mixed
     */
    abstract protected function renderBS3();

    /**
     * Called from the main render function, renders the HTML for Bootstrap 4
     * @return mixed
     */
    abstract protected function renderBS4();

    /**
     * Return the type of the menu object.
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * Render the classes array into the HTML a class element
     * @return string
     */
    protected function renderClasses()
    {
        $render = "class='";

        $classes = '';

        foreach($this->classes as $class){
            $classes .= $class . ' ';
        }

        $render .= rtrim($classes);
        $render .= "'";

        return $render;
    }

    /**
     * Render the styles array into HTML a style element
     * @return string
     */
    protected function renderStyles()
    {
        $render = "styles='";

        $styles = '';

        foreach($this->styles as $k => $v){
            $styles .= $k . ': ' . $v . '; ';
        }

        $render .= rtrim($styles);
        $render .= "'";

        return $render;
    }

    /**
     * Check if the dropdown has items that the user can render (otherwise its an empty dropdown).
     * @return bool
     */
    protected function dropdownHasLinks()
    {
        $allowed = false;

        foreach ($this->list as $item){

            if($item->allow_roles == null &&
                $item->allow_permissions == null &&
                $item->deny_roles == null &&
                $item->deny_permissions == null){

                $allowed = true;

            }elseif(\Auth::user()->ability($item->deny_roles, $item->deny_permissions)){

                $allowed = false;

            }elseif (\Auth::user()->ability('dev|'.$item->allow_roles, $item->allow_permissions)) {

                $allowed = true;
            }

            if($allowed) break;
        }

        return $allowed;

    }
}