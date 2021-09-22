<?php

namespace App\Controllers;

class Purchase extends BaseController
{
    public function index()
    {
        //return view('report/receipt');
    }

    public function receipt()
    {
        return view('report/receipt');
    }
}