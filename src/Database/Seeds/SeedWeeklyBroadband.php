<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedWeeklyBroadband extends Seeder
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
                'namespace' => 'weeklybroadband',
                'type' => 'dropdown',
                'text' => 'Weekly Broadband',
                'priority' => 4,
                'allow_permissions' => 'view-weekly-broadband-dropdown'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.signup-form',
                'type' => 'link',
                'text' => 'Sign Up Form',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/signup/clear'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.statistics',
                'type' => 'link',
                'text' => 'Statistics',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/statistics/boards'),
                'priority' => 2,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.statistics-monthly',
                'type' => 'link',
                'text' => 'Statistics Monthly',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/statistics/monthly'),
                'priority' => 3,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.customers',
                'type' => 'link',
                'text' => 'Signed Up Customers',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/customers'),
                'priority' => 4,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.leads',
                'type' => 'link',
                'text' => 'Leads',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/leads'),
                'priority' => 5,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.bills',
                'type' => 'link',
                'text' => 'Bills',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/bills'),
                'priority' => 6,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.bills-outstanding',
                'type' => 'link',
                'text' => 'Bills - Outstanding',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/bills/outstanding'),
                'priority' => 7,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.bills-dead',
                'type' => 'link',
                'text' => 'Bills - Dead',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/bills/dead'),
                'priority' => 8,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.bills-to-date',
                'type' => 'link',
                'text' => 'Bills To Date',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/customers/bills-to-date'),
                'priority' => 9,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.recent-payments',
                'type' => 'link',
                'text' => 'Recent Payments',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/bills/recent-payments'),
                'priority' => 10,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.bills-items',
                'type' => 'link',
                'text' => 'Bills Items to Upload',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/bills/items'),
                'priority' => 11,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.bills-tomorrow',
                'type' => 'link',
                'text' => 'Bills Customers Tomorrow',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/bills/tomorrow'),
                'priority' => 12,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.customers-initialised',
                'type' => 'link',
                'text' => 'Missed Customers',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/customers/initialised'),
                'priority' => 13,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.register-interest',
                'type' => 'link',
                'text' => 'Registered Interest',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/weeklybroadband/customers/register-interest'),
                'priority' => 14,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'weeklybroadband.website',
                'type' => 'link',
                'text' => 'Website',
                'route' => $this->urlgen('https://www.weeklybroadband/clear-and-signup'),
                'priority' => 15,
            ],
        ];
    }
}
