<?php

namespace App\Models;

class MUser extends BaseModel
{

    public function getAuth($data)
    {
        $data = $this->db->table('user')
            ->select('
                user_id,
                username,
                password,
                user_nama,
                user_img
            ')
            ->where('username', $data['username'])
            ->get()
            ->getResultArray();
        return $data;
    }

    public function getUserForm($id)
    {
        $data = $this->db->table('user')
            ->select('
                user_id,
                username,
                user_nama,
                user_img,
                user_tanggal_lahir,
                user_tempat_lahir,
                user_alamat
            ')
            ->where('user_id', $id)
            ->get()
            ->getRowArray();
        return $data;
    }
    public function userSave($data)
    {
        $id = $data['user_id'];
        unset($data['user_id']);
        if ($id) {
            $set = $this->setCRUDIdentity('update', $data);
            $this->db->table('user')
                ->where('user_id', $id)
                ->set($set)
                ->update();
        } else {
            $set = $this->setCRUDIdentity('insert', $data);
            $this->db->table('user')
                ->set($set)
                ->insert();
        }
        $i = $this->db->affectedRows();
        return $i;
    }
    public function userDel($id)
    {
        $this->db->table('user')
            ->where('user_id', $id)
            ->delete();
        $i = $this->db->affectedRows();
        return $i;
    }
}
