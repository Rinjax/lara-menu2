<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedFinance extends Seeder
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
                'namespace' => 'finance',
                'type' => 'dropdown',
                'text' => 'Finance',
                'priority' => 6,
                'allow_permissions' => 'view-finance-dropdown'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'finance.import-accounts',
                'type' => 'link',
                'text' => 'Import Accounts Board Data',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/finance/imports/accounts'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'finance.billing-reconcile',
                'type' => 'link',
                'text' => 'Billing Reconcile',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/recon/value-invoice-to-affinity'),
                'priority' => 2,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'finance.payment-portal',
                'type' => 'link',
                'text' => 'Payment Portal',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/payment'),
                'priority' => 3,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'finance.outstanding-balance',
                'type' => 'link',
                'text' => 'Oustanding Balances',
                'route' => $this->urlgen('https://crm.global4.co.uk/affinity/balances'),
                'priority' => 4,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'finance.payment-made',
                'type' => 'link',
                'text' => 'Payments Made',
                'route' => $this->urlgen('https://crm.global4.co.uk/admin/payment/payments-made'),
                'priority' => 5,
            ],
        ];
    }
}
