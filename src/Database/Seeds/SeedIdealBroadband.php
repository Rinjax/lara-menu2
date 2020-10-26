<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedIdealBroadband extends Seeder
{
    use \Global4Communications\LaraMenu\Traits\Functions;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       foreach ($this->data() as $item){
           CoreMenu::create($item);
       }
    }

    private function data()
    {
        return [
            [
                'menubar' => 'core',
                'namespace' => 'idealbroadband',
                'type' => 'dropdown',
                'text' => 'Ideal Broadband',
                'priority' => 3,
                'allow_permissions' => 'view-ideal-broadband-dropdown'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'idealbroadband.signup-form',
                'type' => 'link',
                'text' => 'Sign Up Form',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/idealbroadband/signup/clear'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'idealbroadband.signuped-customers',
                'type' => 'link',
                'text' => 'Signed Up Customers',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/idealbroadband/customers'),
                'priority' => 2,
            ]
        ];
    }
}
