<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedWallboards extends Seeder
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
                'namespace' => 'wallboard',
                'type' => 'dropdown',
                'text' => 'Wallboards',
                'priority' => 8,
                'allow_permissions' => 'view-wallboards-dropdown'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.heading1',
                'type' => 'header',
                'text' => 'Queues Overview',
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.queue-overview',
                'type' => 'link',
                'text' => 'Call Queue Overview',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/queue-overview'),
                'priority' => 2,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.queue-overview-compact',
                'type' => 'link',
                'text' => 'Call Queue Overview Compact',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/queue-overview-compact'),
                'priority' => 3,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.separator1',
                'type' => 'separator',
                'priority' => 4,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.heading2',
                'type' => 'header',
                'text' => 'Department Overview',
                'priority' => 5,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.department-accounts',
                'type' => 'link',
                'text' => 'Accounts',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/g4-accounts'),
                'priority' => 6,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.department-ht-credit',
                'type' => 'link',
                'text' => 'HT Credit Control',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/ht-creditcontrol'),
                'priority' => 7,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.department-g4-credit',
                'type' => 'link',
                'text' => 'G4 Credit Control',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/g4-creditcontrol'),
                'priority' => 8,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.separator2',
                'type' => 'separator',
                'priority' => 9,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.heading3',
                'type' => 'header',
                'text' => 'Department Agents Overview',
                'priority' => 10,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.agent-accounts',
                'type' => 'link',
                'text' => 'Accounts',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/g4-accounts/agent-overview'),
                'priority' => 11,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.agent-htcredit',
                'type' => 'link',
                'text' => 'HT Credit Control',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/ht-creditcontrol/agent-overview'),
                'priority' => 12,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.agent-g4credit',
                'type' => 'link',
                'text' => 'G4 Credit Control',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/g4-creditcontrol/agent-overview'),
                'priority' => 13,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.agent-finance',
                'type' => 'link',
                'text' => 'All Finance',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/finance/agent-overview'),
                'priority' => 14,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.agent-g4-sales',
                'type' => 'link',
                'text' => 'G4 Sales',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/g4-sales/agent-overview'),
                'priority' => 15,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.agent-ht-sales',
                'type' => 'link',
                'text' => 'HT Sales',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/ht-sales/agent-overview'),
                'priority' => 16,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.agent-ht-care',
                'type' => 'link',
                'text' => 'HT Customer Care',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/ht-customercare/agent-overview'),
                'priority' => 17,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.agent-residential-provisions',
                'type' => 'link',
                'text' => 'Residential Provisions',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/residential-provisions/agent-overview'),
                'priority' => 18,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.agent-business-provisions',
                'type' => 'link',
                'text' => 'Business Provisions',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/business-provisions/agent-overview'),
                'priority' => 19,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.agent-business-technical',
                'type' => 'link',
                'text' => 'Business Technical',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/business-technical/agent-overview'),
                'priority' => 20,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.separator3',
                'type' => 'separator',
                'priority' => 21,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.heading4',
                'type' => 'header',
                'text' => 'Global4 Views',
                'priority' => 21,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.global4-accounts',
                'type' => 'link',
                'text' => 'Accounts',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/accounts-slider'),
                'priority' => 22,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.separator4',
                'type' => 'separator',
                'priority' => 23,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.heading5',
                'type' => 'header',
                'text' => 'Hometelecom Views',
                'priority' => 24,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.hometelecom-sales',
                'type' => 'link',
                'text' => 'HT Sales',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/hometelecom-slider'),
                'priority' => 25,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'wallboard.hometelecom-tili',
                'type' => 'link',
                'text' => 'Tili Team',
                'route' => $this->urlgen('https://crm.global4.co.uk/cdr/wallboard/tili-slider'),
                'priority' => 22,
            ],
        ];
    }
}
