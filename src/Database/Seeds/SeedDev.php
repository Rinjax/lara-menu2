<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedDev extends Seeder
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
                'namespace' => 'dev',
                'type' => 'dropdown',
                'text' => 'Dev',
                'priority' => 1,
                'allow_roles' => 'dev'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.audits',
                'type' => 'sub-dropdown',
                'text' => 'Audits',
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.audits.database-audit',
                'type' => 'link',
                'text' => 'Database Audits',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/audits'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.audits.controller-audit',
                'type' => 'link',
                'text' => 'Controller Audits',
                'route' => $this->urlgen('https://crm.global4.co.uk/laravel-controller-audit'),
                'priority' => 2,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.audits.console-audit',
                'type' => 'link',
                'text' => 'Console Audits',
                'route' => $this->urlgen('https://crm.global4.co.uk/laravel-console-audit'),
                'priority' => 3,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.phpinfo',
                'type' => 'link',
                'text' => 'PHP Info',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/phpinfo'),
                'priority' => 2,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.logs',
                'type' => 'link',
                'text' => 'Logs',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/logs'),
                'priority' => 3,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.jobs',
                'type' => 'sub-dropdown',
                'text' => 'Jobs',
                'priority' => 4,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.jobs.outstanding',
                'type' => 'link',
                'text' => 'Jobs Outstanding',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/jobs'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.jobs.failed',
                'type' => 'link',
                'text' => 'Jobs Failed',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/jobs/failed'),
                'priority' => 2,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.jobs.completed',
                'type' => 'link',
                'text' => 'Jobs Completed',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/jobs/completed'),
                'priority' => 3,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.environment',
                'type' => 'link',
                'text' => 'Environment',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/environment'),
                'priority' => 5,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.affinity',
                'type' => 'sub-dropdown',
                'text' => 'Affinity',
                'priority' => 6,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.affinity.functions',
                'type' => 'link',
                'text' => 'Affinity Functions',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/functions'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.affinity.types',
                'type' => 'link',
                'text' => 'Affinity Types',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/types'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.wip-tickets',
                'type' => 'link',
                'text' => 'WIP Tickets',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/tickets/tickets'),
                'priority' => 7,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.statistics',
                'type' => 'link',
                'text' => 'Statistics',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/laravel-logger/statistics'),
                'priority' => 8,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.mycalls',
                'type' => 'link',
                'text' => 'MyCalls Compare',
                'route' => $this->urlgen('https://crm.global4.co.uk/dev/mycalls/compare-servers'),
                'priority' => 8,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.elevate',
                'type' => 'sub-dropdown',
                'text' => 'Elevate',
                'priority' => 10,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'dev.elevate.rental-products',
                'type' => 'link',
                'text' => 'Rental Products',
                'route' => $this->urlgen('https://crm.global4.co.uk/elevate/rental-products'),
                'priority' => 1,
            ],
        ];
    }
}
