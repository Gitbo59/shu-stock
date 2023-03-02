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
        $row['purity'] = $data['purity'];
        $row['rate'] = $data['rate_id'];
        $_SESSION['transactions'][] = $row;
    }
}

