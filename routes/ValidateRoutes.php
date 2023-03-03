<?php

class ValidateRoutes
{

    public static function webValidate($uri)
    {
        $items1 = array('login',
            'profile',
            'customers',
            'employees',
            'canteens',
            'canteenview',
            'canteen-cantor',
            'canteen-charles_street',
            'canteen-atrium',
            'canteen-owen_building',
            'canteen-aspect_court',
            'canteen-adsetts',
            'products',
            'rates',
            'stocks',
            'items_sold',
            'transactions',
            'users',
            'logout'
        );

        if($uri[1] == ''){
            return true;
        }
        if (in_array($uri[1], $items1)) {
                return true;
        }
        return false;
    }

    public static function apiValidate($section)
    {
        $items1 =
            array(
                'login',
                'tables',
                'customers',
                'employees',
                'canteens',
                'canteenview',
                'canteen-cantor',
                'canteen-charles_street',
                'canteen-atrium',
                'canteen-owen_building',
                'canteen-aspect_court',
                'canteen-adsetts',
                'products',
                'stocks',
                'stockInfo',
                'items_sold',
                'items_sold_info',
                'canteen_stock_info',
                'transactions',
                "transaction_info",
                'users'
            );
        if (in_array($section, $items1)) {
            return true;
        }
        return false;
    }
}