<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        $input = $this->input->getPost();
        $m = $this->user->getAuth($input);
        if (count($m) > 0) {
            if (!password_verify($input['password'], $m[0]['password'])) $this->ErrorRespon('Username dan Password Anda Salah..');
            unset($m[0]['password']);
            $this->session->set($m[0]);
            $this->SuccessRespon('Otentikasi Berhasil..');
        } else {
            $this->ErrorRespon('Username dan Password Anda Salah..');
        }
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }
}
