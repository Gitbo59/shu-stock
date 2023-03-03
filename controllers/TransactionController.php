<?php

require_once 'Controller.php';
require_once __DIR__ . '/../model/Transaction.php';
require_once __DIR__ . '/../helpers/ValidateParams.php';

class TransactionController extends Controller
{
    public static function index(){
        $page = 'table';
        self::view('layouts/app.php', $page);
    }
    
    public static function get($latest=false){
        $transaction = new Transaction();
        $transactions = $transaction->get($latest);
        foreach($transactions as $transaction){
            $product = new Product();             
            $product = $product->show($transaction['product_id']);             
            $transaction['product'] =  $product;             
            $canteen = new Canteen();             
            $canteen = $canteen->show($transaction['canteen_id']);             
            $transaction['canteen'] =  $canteen;             
            array_shift($transactions);             
            array_push($transactions, $transaction);         
        }
        
        $data['data'] = $transactions;
        echo json_encode($data);
    }
    
    public static function show($id)
    {
        $transaction = new Transaction();
        $transaction = $transaction->show($id);
        if($transaction == false){
            $d = ['transaction' => ['No transaction found with this id.']];
            header('Content-type: application/json');
            http_response_code(422);
            echo json_encode($d);
        }else{
            $data['data'] = ['product_id' => $transaction['product_id'], 'canteen_id' => $transaction['canteen_id']];

            header('Content-type: application/json');
            echo json_encode($data);
        }
    }

    public static function insert($data){
        $transaction = new Transaction();
        $result = true;
        $d = [];
        if (!ValidateParams::validateInteger($data['product_id'])) {
            $result = false;
            $d['product_id'] = ['The product_id must be an integer value'];
        }
        if (!ValidateParams::validateInteger($data['canteen_id'])) {
            $result = false;
            $d['canteen_id'] = ['The canteen_id must be an integer value'];
        }
        
        if($result == true){
            $transaction = $transaction->insert($data);
            if ($transaction == false) {
                $d = ['transaction' => ['There was an error inserting transaction.']];
                header('Content-type: application/json');
                http_response_code(423);
                echo json_encode($d);
            } else {
                ActivitySummary::transactions($data);
                $d = ['transaction' => ['Transaction has been successfully added.']];
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
        $transaction = new Transaction();
        $result = true;
        $d = [];
        if (!ValidateParams::validateInteger($data['product_id'])) {
            $result = false;
            $d['product_id'] = ['The product_id must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['canteen_id'])) {
            $result = false;
            $d['canteen_id'] = ['The canteen_id must be a integer value'];
        }
        
        if($result == true){
            $transaction = $transaction->update($data);
            if ($transaction == false) {
                $d = ['transaction' => ['There was an error updating content.']];
                header('Content-type: application/json');
                http_response_code(422);
                echo json_encode($d);
            } else {
                $d = ['transaction' => ['Transaction has been successfully updated.']];
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
        $transaction = new Transaction();
        if($transaction->delete($id)){
            $d = ['transaction' => ['Transaction has been successfully deleted.']];
            header('Content-type: application/json');
            echo json_encode($d);
        }else{
            $d = ['transaction' => ['There was an error deleting transaction.']];
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