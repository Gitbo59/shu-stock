<?php


class ActivitySummary
{

    public function __construct()
    {
        $_SESSION['transactions'] = array();
    }

    static function transactions($data)
    {
        $row = array();
        $row['weight'] = $data['weight'];
        $row['amount'] = $data['amount'];
        $_SESSION['transactions'][] = $row;
    }
}

