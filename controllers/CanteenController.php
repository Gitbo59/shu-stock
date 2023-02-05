<?php

require_once 'Controller.php';
require_once __DIR__ . '/../model/Canteen.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';

class CanteenController extends Controller
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

    public static function insert($data){
        $canteen = new Canteen();
        $result = true;
        $d = [];
        if (!ValidateParams::name($data['name'])) {
            $result = false;
            $d['name'] = ['The name must be a valid string and it\'s length must not be greater than 70 chars.'];
        }
        if (!ValidateParams::address($data['address'])) {
            $result = false;
            $d['address'] = ['The address must be a valid string and it\'s length must not be greater than 95 chars.'];
        }
        if (!ValidateParams::email($data['email'])) {
            $result = false;
            $d['email'] = ['The email must be a valid email address and length must be less than 121 chars.'];
        }
        if (!ValidateParams::phone($data['phone'])) {
            $result = false;
            $d['phone'] = ['The phone must not be greater than 15 digits.'];
        }
        if($result == true){
            $canteen = $canteen->insert($data);
            if ($canteen == false) {
                $d = ['canteen' => ['There was an error inserting canteen.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['canteen' => ['Canteen has been successfully added.']];
                header('Content-type: application/json');
                echo json_encode($d);
            }
        }else{
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }

    public static function update($data){
        $canteen = new Canteen();
        $result = true;
        $d = [];
        if (!ValidateParams::name($data['name'])) {
            $result = false;
            $d['name'] = ['The name must be a valid string and it\'s length must not be greater than 70 chars.'];
        }
        if (!ValidateParams::address($data['address'])) {
            $result = false;
            $d['address'] = ['The address must be a valid string and it\'s length must not be greater than 95 chars.'];
        }
        if (!ValidateParams::email($data['email'])) {
            $result = false;
            $d['email'] = ['The email must be a valid email address and length must be less than 121 chars.'];
        }
        if (!ValidateParams::phone($data['phone'])) {
            $result = false;
            $d['phone'] = ['The phone must not be greater than 15 digits.'];
        }
        if($result == true){
            $canteen = $canteen->update($data);
            if ($canteen == false) {
                $d = ['canteen' => ['There was an error updating content.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['canteen' => ['Information has been successfully updated.']];
                header('Content-type: application/json');
                echo json_encode($d);
            }
        }else{
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }

    public static function delete($id){
        $canteen = new Canteen();
        if($canteen->delete($id)){
            $d = ['canteen' => ['Canteen has been successfully deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['canteen' => ['There was an error deleting canteen.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }
}