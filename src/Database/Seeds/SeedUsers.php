<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedUsers extends Seeder
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
                'namespace' => 'users',
                'type' => 'dropdown',
                'text' => 'Users',
                'priority' => 12,
                'allow_permissions' => 'view-users-dropdown'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'users.list',
                'type' => 'link',
                'text' => 'List Users',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/users'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'users.roles',
                'type' => 'link',
                'text' => 'Roles',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/roles'),
                'priority' => 1,
            ]
        ];
    }
}
