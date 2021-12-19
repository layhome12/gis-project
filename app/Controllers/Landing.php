<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landing extends BaseController
{
    public function index()
    {
        $data['info'] = $this->utils->getInfoLanding();
        return view('landing/home', $data);
    }
}
