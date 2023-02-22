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
        $row['Amount'] = $data['Amount'];
        $row['rate'] = $data['rate_id'];
        $_SESSION['transactions'][] = $row;
    }
}

