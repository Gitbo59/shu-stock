<?php

require_once 'Controller.php';
require_once __DIR__ . '/../model/Stock.php';
require_once __DIR__ . '/../model/Product.php';
require_once __DIR__ . '/../model/Canteen.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';


class StockController extends Controller
{
    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }

    public static function get(){
        $stock = new Stock();
        $stocks = $stock->get();
        foreach($stocks as $stock){
            $product = new Product();
            $product = $product->show($stock['product_id']);
            $stock['product'] =  $product;
            $canteen = new Canteen();
            $canteen = $canteen->show($stock['canteen_id']);
            $stock['canteen'] =  $canteen;
            array_shift($stocks);
            array_push($stocks, $stock);
        }

        $data['data'] = $stocks;
        echo json_encode($data);
    }

    public static function show($id)
    {
        $stock = new Stock();
        $stock = $stock->show($id);
        if($stock == false){
            $d = ['stock' => ['No stock found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['weight' => $stock['weight'], 'Amount' => $stock['Amount'], 'canteen_id' => $stock['canteen_id'], 'product_id' => $stock['product_id'], 'dop' => $stock['dop']];

            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function insert($data){
        $stock = new Stock();
        $result = true;
        $d = [];
        if (!ValidateParams::validateInteger($data['weight'])) {
            $result = false;
            $d['weight'] = ['The weight must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['Amount'])) {
            $result = false;
            $d['Amount'] = ['The Amount must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['product_id'])) {
            $result = false;
            $d['product_id'] = ['The product id id must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['canteen_id'])) {
            $result = false;
            $d['canteen_id'] = ['The canteen id id must be a integer value'];
        }
        if (!ValidateParams::dateTime($data['dop'])) {
            $result = false;
            $d['dop'] = ['The date must be in valid format(Y-m-d H:i:s).'];
        }
        if($result == true){
            $stock = $stock->insert($data);
            if ($stock == false) {
                $d = ['stock' => ['There was an error inserting stock.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['stock' => ['Stock has been successfully added.']];
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
        $stock = new Stock();
        $result = true;
        $d = [];
        if (!ValidateParams::validateInteger($data['weight'])) {
            $result = false;
            $d['weight'] = ['The weight must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['Amount'])) {
            $result = false;
            $d['Amount'] = ['The Amount must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['canteen_id'])) {
            $result = false;
            $d['canteen_id'] = ['The canteen id id must be a integer value'];
        }
        if (!ValidateParams::dateTime($data['dop'])) {
            $result = false;
            $d['dop'] = ['The date must be in valid format(Y-m-d H:i:s).'];
        }
        if($result == true){
            $stock = $stock->update($data);
            if ($stock == false) {
                $d = ['stock' => ['There was an error updating content.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['stock' => ['Stock has been successfully updated.']];
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
        $stock = new Stock();
        if($stock->delete($id)){
            $d = ['stock' => ['Stock has been successfully deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['stock' => ['There was an error deleting stock.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }
    }

    public static function info(){
        $product = new Product();
        $products = $product->get();
        $canteen = new Canteen();
        $canteens = $canteen->get();
        $data['data']['products'] = $products;
        $data['data']['canteens'] = $canteens;
        echo json_encode($data);
    }
}