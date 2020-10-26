<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedAffinity extends Seeder
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
                'namespace' => 'affinity',
                'type' => 'dropdown',
                'text' => 'Affinity',
                'priority' => 10,
                'allow_permissions' => 'view-affinity-dropdown'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'affinity.sites',
                'type' => 'link',
                'text' => 'Sites',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/sites'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'affinity.sub-sites',
                'type' => 'link',
                'text' => 'Sub Sites',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/sub-sites'),
                'priority' => 2,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'affinity.clis',
                'type' => 'link',
                'text' => 'CLIs',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/clis'),
                'priority' => 3,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'affinity.product-items',
                'type' => 'link',
                'text' => 'Product Items',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/product-items'),
                'priority' => 4,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'affinity.credit-control',
                'type' => 'link',
                'text' => 'Credit Control',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/credit-control'),
                'priority' => 5,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'affinity.bumped',
                'type' => 'link',
                'text' => 'Bumped Tickets',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/bumped'),
                'priority' => 6,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'affinity.bumped-no-change',
                'type' => 'link',
                'text' => 'Bumped Tickets - No Change',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/bumped/no-change'),
                'priority' => 7,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'affinity.call-report',
                'type' => 'link',
                'text' => 'Call Report',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/cdr/index'),
                'priority' => 8,
            ]
        ];
    }
}
