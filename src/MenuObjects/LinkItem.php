<?php

namespace Global4Communications\LaraMenu\MenuObjects;

class LinkItem extends MenuObject
{
    /**
     * Type of this menu object
     * @var string
     */
    protected $type = 'link';

    /**
     * Text to display in the browser view
     * @var string
     */
    protected $displayText = '';

    /**
     * The route that the link will point to.
     * @var null
     */
    protected $route = null;


    public function __construct($text, $route)
    {
        $this->displayText = $text;

        $this->route = $route;
    }

    /**
     * Render the object for Boostrap 3
     * @return mixed|string
     */
    protected function renderBS3()
    {
        $this->render .= '<li ';

        if(count($this->classes) > 0) $this->render .= ' ' . $this->renderClasses();

        if(count($this->styles) > 0) $this->render .= ' ' . $this->renderStyles();

        $this->render .= "><a href='" . $this->getRoute() . "'>" . $this->displayText . "</a></li>";

        return $this->render;
    }

    /**
     * Render the object for Bootstrap 4
     * @return mixed|void
     */
    protected function renderBS4()
    {
        $this->render .= "<a ";

        if(count($this->classes) > 0) $this->render .= ' ' . $this->renderClasses();

        if(count($this->styles) > 0) $this->render .= ' ' . $this->renderStyles();

        $this->render .= "href='" . $this->getRoute() . "'>" . $this->displayText . "</a>";
    }

    /**
     * Get the Route for the link. If the string starts with 'http' then assumed a proper full link and just return that back.
     * Otherwise will use the Laravel route() helper function to resolve the route name.
     * @return |null
     */
    protected function getRoute()
    {
        if(
            substr($this->route, 0, 7) == 'http://' ||
            substr($this->route, 0, 8) == 'https://' ||

            substr($this->route, 0, 1) == '#'
        ) {
            return $this->route;

        }elseif(substr($this->route, 0, 4) == 'dev.'){

            return 'http://' . $this->route;

        }else{
            return url($this->route);
        }
    }

}