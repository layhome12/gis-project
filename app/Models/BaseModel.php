<?php

namespace App\Models;

use CodeIgniter\Config\Services;
use Config\Database;
use CodeIgniter\Model;

class BaseModel extends Model
{
    public function __construct()
    {
        $this->db = Database::connect();
        $this->input = Services::request();
        $this->session = Services::session();
    }
    public function SuccessRespon($msg, $data = [])
    {
        $json = ['status' => 1, 'msg' => $msg, 'data' => $data];
        echo json_encode($json);
        die;
    }
    public function ErrorRespon($msg, $data = [])
    {
        $json = ['status' => 0, 'msg' => $msg];
        echo json_encode($json);
        die;
    }
    public function setCRUDIdentity($case, $data = [])
    {
        switch ($case) {
            case 'insert':
                $data['created_time'] = date('Y-m-d H:i:s');
                $data['created_by'] = session()->get('user_id');
                break;
            case 'update':
                $data['updated_time'] = date('Y-m-d H:i:s');
                $data['updated_by'] = session()->get('user_id');
                break;
            default:
                #code
                break;
        }
        return $data;
    }
    public function setKeyData($arr = [])
    {
        if (isset($arr['id']) && $arr['key'] == 1) {
            $this->db->table($arr['table'])
                ->where($arr['where'])
                ->set([$arr['field'] => 0])
                ->update();
            $this->db->table($arr['table'])
                ->where($arr['table'] . '_id', $arr['id'])
                ->set([$arr['field'] => 1])
                ->update();
        }
    }
}
