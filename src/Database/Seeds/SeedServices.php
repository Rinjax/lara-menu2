<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedServices extends Seeder
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
                'namespace' => 'services',
                'type' => 'dropdown',
                'text' => 'Services',
                'priority' => 11,
                'allow_permissions' => 'view-services-dropdown'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'services.on-call',
                'type' => 'link',
                'text' => 'On Call Engineer',
                'route' => $this->urlgen('https://crm.global4.co.uk/services/on-call'),
                'priority' => 1,
            ]
        ];
    }
}
