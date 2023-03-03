<?php

require_once 'Controller.php';
require_once __DIR__ . '/../model/Canteen.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';

class CanteenSelector extends Controller
{
    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }

    public static function get(){
        $canteen = new Canteen;
        $canteens = $canteen->get();
        $data['data'] = $canteens;
        echo json_encode($data);
    }

    public static function show($id)
    {
        $canteen = new Canteen();
        $canteen = $canteen->show($id);
        if($canteen == false){
            $d = ['canteen' => ['No canteen found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['name' => $canteen['name'], 'phone' => $canteen['phone'], 'address' => $canteen['address'], 'email' => $canteen['email']];
            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

}