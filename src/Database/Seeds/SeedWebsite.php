<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Global4Communications\LaraMenu\Models\CoreMenu;
use Illuminate\Database\Seeder;

class SeedWebsite extends Seeder
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
                'namespace' => 'website',
                'type' => 'dropdown',
                'text' => 'Website',
                'priority' => 5,
                'allow_permissions' => 'view-website-dropdown'
            ],
            [
                'menubar' => 'core',
                'namespace' => 'website.home-page',
                'type' => 'link',
                'text' => 'Home Page',
                'route' => $this->urlgen('https://www.global4.co.uk'),
                'priority' => 1,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'website.blog',
                'type' => 'link',
                'text' => 'Blog / News',
                'route' => $this->urlgen('https://crm.global4.co.uk/cms/blog'),
                'priority' => 2,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'website.case-studies',
                'type' => 'link',
                'text' => 'Case Studies',
                'route' => $this->urlgen('https://crm.global4.co.uk/cms/case-studies'),
                'priority' => 3,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'website.testimonials',
                'type' => 'link',
                'text' => 'Testimonials',
                'route' => $this->urlgen('https://crm.global4.co.uk/cms/testimonials'),
                'priority' => 4,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'website.careers',
                'type' => 'link',
                'text' => 'Careers',
                'route' => $this->urlgen('https://crm.global4.co.uk/cms/careers'),
                'priority' => 5,
            ],
            [
                'menubar' => 'core',
                'namespace' => 'website.jargon',
                'type' => 'link',
                'text' => 'Jargon Buster',
                'route' => $this->urlgen('https://crm.global4.co.uk/cms/jargons'),
                'priority' => 6,
            ],
        ];
    }
}
