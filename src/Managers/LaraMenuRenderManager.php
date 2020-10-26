<?php

namespace Global4Communications\LaraMenu\Managers;

class LaraMenuRenderManager
{

    protected $render = '';


    /**
     * Render standard Bootstrap3 Menu
     * @param $menu
     * @param $classes
     * @return string
     */
    public function renderBS3Standard($menu, $classes)
    {
        $this->render .= "<ul " . $this->renderClasses($classes) . ">";

        foreach($menu as $item){
            $this->render .= $item->render(3);
        }

        $this->render .= "</ul>";

        return $this->render;

    }

    /**
     * Render the classes array in to HTML string
     * @param $classes
     * @return string
     */
    protected function renderClasses($classes)
    {
        $render = "class='";

        $string = '';

        foreach($classes as $class){
            $string .= $class . ' ';
        }

        $render .= rtrim($string);
        $render .= "'";

        return $render;
    }

    /**
     * Render the styles array into HTML string
     * @param $styles
     * @return string
     */
    protected function renderStyles($styles)
    {
        $render = "styles='";

        $string = '';

        foreach($styles as $k => $v){
            $string .= $k . ': ' . $v . '; ';
        }

        $render .= rtrim($string);
        $render .= "'";

        return $render;
    }
}