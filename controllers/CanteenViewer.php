<?php

require_once 'Controller.php';
require_once __DIR__ . '/../model/Canteen.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';

class CanteenViewer extends Controller
{
    public static function index(){
        $page = 'canteen';
        self::view('layouts/app.php', $page);
    }
}