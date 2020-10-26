<?php

namespace Global4Communications\LaraMenu\Http\Controllers;

use App\Http\Controllers\Controller;
use Global4Communications\LaraMenu\Managers\LaraMenuManager;

class TestBS3Controller extends Controller
{
    protected $MenuManager;

    public function __construct()
    {
        $this->MenuManager = new LaraMenuManager(3);
    }

    /**
     * Generic test of menu
     * @return mixed
     */
    public function standard()
    {
        $m = $this->MenuManager->importMenu()->loadMenu();


        return view('laramenu::BS3.standard')->with('menu', $m);
    }
}