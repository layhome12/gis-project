<?php

namespace App\Models;

class MLayer extends BaseModel
{
    //Layer
    public function getLayerForm($id)
    {
        $data = $this->db->table('geojson as gj')
            ->select('
                gj.geojson_id,
                gj.geojson_type_id,
                gj.geojson_nama,
                gj.geojson_file,
                gj.geojson_urutan,
                c.color_id,
                c.color_nama,
                ct.color_type_id
            ')
            ->join('color as c', 'gj.color_id=c.color_id')
            ->join('color_type as ct', 'c.color_type_id=ct.color_type_id')
            ->where('geojson_id', $id)
            ->get()
            ->getRowArray();
        return $data;
    }
    public function layerSave($data)
    {
        $id = $data['geojson_id'];
        unset($data['geojson_id']);
        if ($id) {
            $set = $this->setCRUDIdentity('update', $data);
            $this->db->table('geojson')
                ->where('geojson_id', $id)
                ->set($set)
                ->update();
        } else {
            $set = $this->setCRUDIdentity('insert', $data);
            $this->db->table('geojson')
                ->set($set)
                ->insert();
        }
        $i = $this->db->affectedRows();
        return $i;
    }
    public function layerDel($id)
    {
        $this->db->table('geojson')
            ->where('geojson_id', $id)
            ->delete();
        $i = $this->db->affectedRows();
        return $i;
    }

    //Properties
    public function getPropertiesForm($id)
    {
        $data = $this->db->table('properties')
            ->select('
            properties_id,
            properties_nama,
            properties_label,
            properties_tahun,
            is_legend,
            geojson_id
            ')
            ->where('properties_id', $id)
            ->get()
            ->getRowArray();
        return $data;
    }
    public function propertiesSave($data)
    {
        $id = $data['properties_id'];
        unset($data['properties_id']);
        if ($id) {
            $this->setKeyData([
                'table' => 'properties',
                'field' => 'is_legend',
                'where' => ['geojson_id' => $data['geojson_id']],
                'key' => $data['is_legend'],
                'id' => $id
            ]);
            $set = $this->setCRUDIdentity('update', $data);
            $this->db->table('properties')
                ->where('properties_id', $id)
                ->set($set)
                ->update();
        } else {
            $set = $this->setCRUDIdentity('insert', $data);
            $this->db->table('properties')
                ->set($set)
                ->insert();
            $this->setKeyData([
                'table' => 'properties',
                'field' => 'is_legend',
                'where' => ['geojson_id' => $data['geojson_id']],
                'key' => $data['is_legend'],
                'id' => $this->db->insertID()
            ]);
        }
        $i = $this->db->affectedRows();
        return $i;
    }
    public function propertiesDel($id)
    {
        $this->db->table('properties')
            ->where('properties_id', $id)
            ->delete();
        $i = $this->db->affectedRows();
        return $i;
    }

    //Properties Sub
    public function getPropertiesSubForm($id)
    {
        $data = $this->db->table('properties_sub')
            ->select('
            properties_sub_id,
            properties_id,
            desa_kelurahan_id,
            properties_value,
            properties_lcode
            ')
            ->where('properties_sub_id', $id)
            ->get()
            ->getRowArray();
        return $data;
    }
    public function propertiesSubSave($data)
    {
        $id = $data['properties_sub_id'];
        unset($data['properties_sub_id']);
        if ($id) {
            $set = $this->setCRUDIdentity('update', $data);
            $this->db->table('properties_sub')
                ->where('properties_sub_id', $id)
                ->set($set)
                ->update();
        } else {
            $set = $this->setCRUDIdentity('insert', $data);
            $this->db->table('properties_sub')
                ->set($set)
                ->insert();
        }
        $i = $this->db->affectedRows();
        return $i;
    }
    public function propertiesSubDel($id)
    {
        $this->db->table('properties_sub')
            ->where('properties_sub_id', $id)
            ->delete();
        $i = $this->db->affectedRows();
        return $i;
    }

    //Color
    public function getColorForm($id)
    {
        $data = $this->db->table('color')
            ->select('
            color_type_id,
            color_nama,
            color_id
            ')
            ->where('color_id', $id)
            ->get()
            ->getRowArray();
        return $data;
    }
    public function colorSave($data)
    {
        $id = $data['color_id'];
        unset($data['color_id']);
        if ($id) {
            $set = $this->setCRUDIdentity('update', $data);
            $this->db->table('color')
                ->where('color_id', $id)
                ->set($set)
                ->update();
        } else {
            $set = $this->setCRUDIdentity('insert', $data);
            $this->db->table('color')
                ->set($set)
                ->insert();
        }
        $i = $this->db->affectedRows();
        return $i;
    }
    public function colorDel($id)
    {
        $this->db->table('color')
            ->where('color_id', $id)
            ->delete();
        $i = $this->db->affectedRows();
        return $i;
    }

    //Color Sub
    public function getColorSubForm($id)
    {
        $data = $this->db->table('color_fill')
            ->select('
            color_fill_id,
            color_id,
            color_fill_hexa,
            color_legend,
            color_legend_max
            ')
            ->where('color_fill_id', $id)
            ->get()
            ->getRowArray();
        return $data;
    }
    public function colorSubSave($data)
    {
        $id = $data['color_fill_id'];
        unset($data['color_fill_id']);
        if ($id) {
            $set = $this->setCRUDIdentity('update', $data);
            $this->db->table('color_fill')
                ->where('color_fill_id', $id)
                ->set($set)
                ->update();
        } else {
            $set = $this->setCRUDIdentity('insert', $data);
            $this->db->table('color_fill')
                ->set($set)
                ->insert();
        }
        $i = $this->db->affectedRows();
        return $i;
    }
    public function colorSubDel($id)
    {
        $this->db->table('color_fill')
            ->where('color_fill_id', $id)
            ->delete();
        $i = $this->db->affectedRows();
        return $i;
    }

    //Get Data
    public function getLayers()
    {
        $data = $this->db->table('geojson as gj')
            ->select('
                gj.geojson_file, 
                gj.geojson_nama,
                ct.color_type_id, 
                gj.geojson_id
            ')
            ->join('color as c ', 'c.color_id=gj.color_id')
            ->join('color_type as ct', 'ct.color_type_id=c.color_type_id')
            ->orderBy('gj.geojson_urutan', 'asc')
            ->get()
            ->getResultArray();
        return $data;
    }
    public function getLegend()
    {
        $data = $this->db->table('geojson as g')
            ->select('cf.color_fill_hexa as color, cf.color_legend, c.color_nama')
            ->join('color as c', 'c.color_id=g.color_id')
            ->join('color_type as ct', 'c.color_type_id=ct.color_type_id')
            ->join('color_fill as cf', 'cf.color_id=c.color_id')
            ->where('g.geojson_urutan', 1)
            ->where('c.color_type_id', 3)
            ->orderBy('cf.color_legend', 'asc')
            ->get()
            ->getResultArray();
        return $data;
    }
}
