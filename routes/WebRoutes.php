<?php


require_once 'Route.php';
require_once __DIR__ . '/../routes/ValidateRoutes.php';
require_once __DIR__ . '/../helpers/Auth.php';
require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/LoginController.php';
require_once __DIR__ . '/../controllers/ProfileController.php';
require_once __DIR__ . '/../controllers/CustomerController.php';
require_once __DIR__ . '/../controllers/StockController.php';
require_once __DIR__ . '/../controllers/ProductController.php';
require_once __DIR__ . '/../controllers/TableController.php';
require_once __DIR__ . '/../controllers/CanteenController.php';
require_once __DIR__ . '/../controllers/CanteenViewer.php';
require_once __DIR__ . '/../controllers/CanteenSelector.php';
require_once __DIR__ . '/../controllers/ItemsSoldController.php';

class WebRoutes extends Route
{

    public static function invoke($uri)
    {
        $loggedIn = Auth::userLogged();
        if (!ValidateRoutes::webValidate($uri))
            self::view("layouts/error.php");
        else {
            if (!$loggedIn && $uri[1] == 'login')
                LoginController::index();
            else {
                if (!$loggedIn)
                    header('Location: /login');
                else
                    self::findController($uri[1]);
            }
        }
    }

    static function findController($section)
    {
        switch ($section) {
            case 'customers':
                CustomerController::index();
                break;
            case 'employees':
                if(Auth::isAdmin()){
                    EmployeeController::index();
                    break;
                }else{
                    self::view("layouts/error.php");
                    break;
                }
            case 'users':
                if(Auth::isAdmin()){
                    UserController::index();
                    break;
                }else{
                    self::view("layouts/error.php");
                    break;
                }
            case 'rates':
                RateController::index();
                break;
            case 'transactions':
                TransactionController::index();
                break;
            case 'stocks':
                StockController::index();
                break;
            case 'products':
                ProductController::index();
                break;
            case 'canteens':
                CanteenController::index();
                break;
            case 'canteenview':
                CanteenViewer::index();
            break;
            case 'canteen-cantor':
                CanteenSelector::index();
            break;
            case 'canteen-charles_street':
                CanteenSelector::index();
            break;
            case 'canteen-atrium':
                CanteenSelector::index();
            break;
            case 'canteen-owen_building':
                CanteenSelector::index();
            break;
            case 'canteen-aspect_court':
                CanteenSelector::index();
            break;
            case 'canteen-adsetts':
                CanteenSelector::index();
            break;
            case 'items_sold':
                ItemsSoldController::index();
                break;
            case 'login':
                header('Location: /');
                break;
            case '':
                HomeController::index();
                break;
            case 'profile':
                ProfileController::index();
                break;
            case 'logout':
                LoginController::logout();
                break;
        }
    }


}