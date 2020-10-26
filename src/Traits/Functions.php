<?php

namespace Global4Communications\LaraMenu\Traits;

trait Functions
{
    public function urlgen($url)
    {
        if(env('APP_ENV') == 'local'){
            if(substr($url, 0, 10) == 'http://www'){
                return 'http://dev' . substr($url, 10);
            }

            if(substr($url, 0, 11) == 'https://www'){
                return 'http://dev' . substr($url, 11);
            }

            if(substr($url, 0, 11) == 'https://crm'){
                return 'http://dev' . substr($url, 11);
            }
        }
    }
}