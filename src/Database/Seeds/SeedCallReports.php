<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedCallReports extends Seeder
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
                'namespace' => 'call-reports',
                'type' => 'dropdown',
                'text' => 'Call Reports',
                'priority' => 9,
                'allow_permissions' => 'view-wallboards-dropdown'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'call-reports.agent',
                'type' => 'link',
                'text' => 'By Agent',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/report/agent'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'call-reports.department',
                'type' => 'link',
                'text' => 'By Department',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/report/department'),
                'priority' => 2,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'call-reports.separator1',
                'type' => 'separator',
                'priority' => 3,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'call-reports.affinity-calls',
                'type' => 'link',
                'text' => 'Affinity Call Report',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/cdr/index'),
                'priority' => 4,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'call-report.aged-debt',
                'type' => 'link',
                'text' => 'Aged Debt Call Report',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/report/aged-debts'),
                'priority' => 5,
            ]
        ];
    }
}
