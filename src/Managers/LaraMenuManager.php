<?php

namespace Global4Communications\LaraMenu\Managers;

use Global4Communications\LaraMenu\MenuObjects\DropdownItem;
use Global4Communications\LaraMenu\MenuObjects\LinkItem;
use Global4Communications\LaraMenu\MenuObjects\MenuHeaderItem;
use Global4Communications\LaraMenu\MenuObjects\MenuSeparatorItem;
use Global4Communications\LaraMenu\MenuObjects\SubDropdownItem;
use Global4Communications\LaraMenu\Models\CoreMenu;
use Carbon\Carbon;

class LaraMenuManager
{
    /**
     * The Bootstrap version.
     * @var 
     */
    protected $BSVersion;

    /**
     * Type of menu to render - EG Standard, Tab
     * @var string
     */
    protected $menuType = 'standard';

    /**
     * Currently available menu types for rendering - default standard
     * @var array
     */
    protected $availableMenuTypes = ['standard'];

    /**
     * The manager for rendering the menu
     * @var LaraMenuRenderManager
     */
    protected $Renderer;

    /**
     * The total menu components pulled from the database
     * @var
     */
    protected $menu = [];

    /**
     * Class to apply to the main part of the menu (top level ul, div, nav)
     * @var array
     */
    protected $menuClasses = [];


    public function __construct($BSVersion = 3)
    {
        $this->BSVersion = $BSVersion;

        $this->Renderer = new LaraMenuRenderManager();

    }

    /**
     * Return the currently set Bootstrap version.
     * @return mixed
     */
    public function getBSVersion()
    {
        return $this->BSVersion;
    }

    /**
     * Set the menu type for rendering
     * @param $type
     */
    public function setMenuType($type)
    {
        if(in_array($type, $this->availableMenuTypes)){
            $this->menuType = $type;
        }else{
            dd('ERROR - Wrong type. Available types are: ' . $this->availableMenuTypes);
        }
    }

    public function loadMenu($menubar)
    {
        $this->menu = $this->loadCache($menubar);

        return $this;
    }

    /**
     * Use the RenderManager to render the final menu HTML
     * @return string
     */
    public function render()
    {
        switch([$this->BSVersion, $this->menuType]){
            case [3, 'standard']:
                return $this->Renderer->renderBS3Standard($this->menu, $this->menuClasses);
                break;
            case [3, 'crm-main']:
                return $this->Renderer->renderBS3CrmMain($this->menu, $this->menuClasses);
                break;
        }
    }

    /**
     * Import the menu from the database
     * @param $config
     * @return $this
     */
    protected function importMenu($menubar)
    {
        return CoreMenu::where('disabled',0)->where('menubar', $menubar)->orderBy('priority')->get();

    }

    /**
     * Convert the database collection into package versions objects
     * @param $menu
     */
    protected function bulidMenuArray($menu)
    {
        $array = [];

        // setup the namespacing attriubutes for ordering
        foreach ($menu as $m){
            $m->namespacing();
            $m->level();
        }

        foreach ($menu as $item){
            if($item->level == 1){

                $array[] = $this->createMenuItem($item, $menu);
            }
        }

        return $array;

    }

    /**
     * Switching function to work out which menu item to add.
     * @param $item
     * @param $menu
     * @return DropdownItem|LinkItem|SubDropdownItem
     */
    protected function createMenuItem($item, $menu)
    {
        switch($item->type){
            case 'link':
                return $this->createLink($item);
                break;
            case 'dropdown':
                return $this->createDropdown($item, $menu);
                break;
            case 'sub-dropdown':
                return $this->createSubDropdown($item, $menu);
                break;
            case 'separator':
                return $this->createSeparator($item);
                break;
            case 'header':
                return $this->createHeader($item);
                break;
        }
    }

    /**
     * Add a class to the main part of the menu
     * @param $class
     * @return $this
     */
    public function addMenuClass($class)
    {
        if(is_string($class)) array_push($this->menuClasses, $class);

        if(is_array($class)) $this->menuClasses = array_merge($this->menuClasses, $class);

        return $this;
    }



    /**
     * Add a link to the menu
     * @param array $data
     * @return $this
     */
    protected function addLink(CoreMenu $item)
    {
        $link = $this->createLink($item);

        array_push($this->menu, $link);

        return $this;
    }

    /**
     * Add a dropdown link to the menu
     * @param array $data
     * @return $this
     */
    protected function addDropdown(array $data)
    {
        $drop = $this->createDropdown($data);

        array_push($this->menu, $drop);

        return $this;
    }

    /**
     * Create the link object to be added, that will represent the menu link.
     * @param array $data
     * @return LinkItem
     */
    protected function createLink(CoreMenu $item)
    {
        $link = new LinkItem($item->text, $item->route);

        $link->classes = $item->classes();
        $link->styles = $item->styles();
        $link->allow_permissions = $item->allowPermissions();
        $link->allow_roles = $item->allowRoles();
        $link->deny_permissions = $item->denyPermissions();
        $link->deny_roles = $item->denyRoles();

        return $link;
    }

    /**
     * Create the dropdown object to be added, that will represent the menu dropdown
     * @param $data
     * @return DropdownItem
     */
    protected function createDropdown(CoreMenu $item, $menu)
    {
        $drop = new DropdownItem($item->text);

        $drop->classes = $item->classes();
        $drop->styles = $item->styles();
        $drop->allow_permissions = $item->allowPermissions();
        $drop->allow_roles = $item->allowRoles();
        $drop->deny_permissions = $item->denyPermissions();
        $drop->deny_roles = $item->denyRoles();

        $k = $this->getDropdownItems($item, $menu);


        foreach ($k as $subitem){

            $drop->list[] = $this->createMenuItem($subitem, $menu);
        }

        return $drop;
    }

    /**
     * Create the subdropdown object to be added, that will represent the menu subdropdown.
     * @param CoreMenu $item
     * @param $menu
     * @return SubDropdownItem
     */
    protected function createSubDropdown(CoreMenu $item, $menu)
    {
        $drop = new SubDropdownItem($item->text);

        $drop->classes = $item->classes();
        $drop->styles = $item->styles();
        $drop->allow_permissions = $item->allowPermissions();
        $drop->allow_roles = $item->allowRoles();
        $drop->deny_permissions = $item->denyPermissions();
        $drop->deny_roles = $item->denyRoles();

        $k = $this->getDropdownItems($item, $menu);


        foreach ($k as $subitem){

            $drop->list[] = $this->createMenuItem($subitem, $menu);
        }

        return $drop;
    }

    /**
     * Create a Menu heading object to be added, that will represent a sub heading on a dropdown.
     * @param CoreMenu $item
     * @return MenuHeaderItem
     */
    protected function createHeader(CoreMenu $item)
    {
        $header = new MenuHeaderItem($item->text);

        $header->classes = $item->classes();
        $header->styles = $item->styles();
        $header->allow_permissions = $item->allowPermissions();
        $header->allow_roles = $item->allowRoles();
        $header->deny_permissions = $item->denyPermissions();
        $header->deny_roles = $item->denyRoles();
        
        return $header;
        
    }

    /**
     * Create a Separator object to be added, that will represent a menu separator.
     * @param CoreMenu $item
     * @return MenuHeaderItem
     */
    protected function createSeparator(CoreMenu $item)
    {
        $separator = new MenuSeparatorItem();

        $separator->classes = $item->classes();
        $separator->styles = $item->styles();
        $separator->allow_permissions = $item->allowPermissions();
        $separator->allow_roles = $item->allowRoles();
        $separator->deny_permissions = $item->denyPermissions();
        $separator->deny_roles = $item->denyRoles();

        return $separator;
    }



    /**
     * Search through the database collection for the dropdown's sub components.
     * @param CoreMenu $dropdown
     * @param $menu
     * @return array
     */
    protected function getDropdownItems(CoreMenu $dropdown, $menu)
    {
        $array = [];

        $nextLevelItems = $menu->filter(function($item) use ($dropdown, $menu){
            return ($item->level == ($dropdown->level + 1));
        });

        foreach($nextLevelItems as $item){
            $i = 0;
            $add = false;

            while($i < $dropdown->level){
                if($item->namespacing[$i]  == $dropdown->namespacing[$i]){
                    $add = true;
                    $i++;
                }else{
                    $add = false;
                    break;
                }
            }

            if($add) array_push($array, $item);
        }

        return $array;
    }

    /**
     * Load the menu cache if present, or import the database records and build the menu and store to cache.
     * @param $menubar
     * @return mixed
     */
    protected function loadCache($menubar)
    {
        $cache = \Cache::remember("menu_".$menubar, Carbon::tomorrow(), function() use ($menubar){

            $menu = $this->importMenu($menubar);

            return $this->bulidMenuArray($menu);

        });

        return $cache;
    }
}