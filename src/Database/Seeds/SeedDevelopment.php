<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedDevelopment extends Seeder
{
    use \Global4Communications\LaraMenu\Traits\Functions;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item)
        {
            CoreMenu::create($item);
        }
    }

    private function data()
    {
        return [
            [
                'menubar' => 'core',
                'namespace' => 'development',
                'type' => 'dropdown',
                'text' => 'Development',
                'priority' => 2,
                'allow_roles' => 'dev'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.team-schedule',
                'type' => 'link',
                'text' => 'Team Work Schedule',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/task/work-schedule'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.separator1',
                'type' => 'separator',
                'priority' => 2,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.new-requests',
                'type' => 'link',
                'text' => 'New Development Requests',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/task/new-request'),
                'priority' => 3,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.outstanding-requests',
                'type' => 'link',
                'text' => 'Outstanding Development Requests',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/task/outstanding-request'),
                'priority' => 4,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.company-crm',
                'type' => 'link',
                'text' => 'Company CRM',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/task/category/company_crm'),
                'priority' => 4,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.g4-website',
                'type' => 'link',
                'text' => 'Global 4 Website',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/task/category/g4_website'),
                'priority' => 5,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.weekly-broadband',
                'type' => 'link',
                'text' => 'Weekly Broadband',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/task/category/weekly_broadband'),
                'priority' => 6,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.sales-crm',
                'type' => 'link',
                'text' => 'Sales CRM',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/task/category/sales_crm'),
                'priority' => 7,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.ideal-broadband',
                'type' => 'link',
                'text' => 'Ideal Broadband',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/task/category/ideal_broadband'),
                'priority' => 8,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.ht-tili',
                'type' => 'link',
                'text' => 'Tili Jnr / HT Sales',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/task/category/tili_jnr'),
                'priority' => 9,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'development.uncategorized',
                'type' => 'link',
                'text' => 'Un-Categorized',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/task/category/uncategorized'),
                'priority' => 10,
            ],
        ];
    }
}
