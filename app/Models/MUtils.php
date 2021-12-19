<?php

namespace App\Models;

class MUtils extends BaseModel
{
    public function getData($arr = [])
    {
        $DB = $this->db->table($arr['table']);
        $DB->select($arr['select']);
        $DB->where($arr['where']);
        $data = $DB->get()->getRowArray();
        return $data;
    }
    public function getSelect2Data($arr = [])
    {
        $DB = $this->db->table($arr['table']);
        $DB->select($arr['table'] . '_id as id, ' . $arr['table'] . '_nama as text');
        $DB->where($arr['where']);
        $data = $DB->get()->getResultArray();
        return $data;
    }
    public function getDataProperties($arr)
    {
        $data = $this->db->table('properties_sub as ps')
            ->select('
                kel.desa_kelurahan_nama,
                p.properties_nama,
                p.properties_label,
                p.properties_tahun,
                ps.properties_value
            ')
            ->join('area_desakelurahan as kel', 'ps.desa_kelurahan_id=kel.desa_kelurahan_id')
            ->join('properties as p', 'ps.properties_id=p.properties_id')
            ->join('geojson as g', 'p.geojson_id=g.geojson_id')
            ->where('ps.properties_lcode', $arr['lcode'])
            ->where('g.geojson_id', $arr['geojson_id'])
            ->orderBy('p.properties_tahun', 'desc')
            ->get()->getResultArray();
        return $data;
    }
    public function colorTypeOptions($id)
    {
        $data = $this->db->table('color')
            ->select('color_id, color_type_id')
            ->where('color_id', $id)
            ->get()
            ->getRowArray();
        $color_type = isset($data['color_type_id']) ? $data['color_type_id'] : '0';
        unset($data['color_type_id']);
        switch ($color_type) {
            case '1':
                $i = $this->db->table('color_fill')->where('color_id', $data['color_id'])->countAllResults();
                (!$i) ? $data['is_add'] = true : $data['is_add'] = false;
                break;
            case '2':
                $data['is_add'] = true;
                break;
            case '3':
                $data['is_add'] = true;
                $data['is_legend'] = true;
                break;
            default:
                $data['is_add'] = true;
                break;
        }
        return $data;
    }
    public function getColors($arr)
    {
        $m = $this->db->table('geojson as g')
            ->select('ct.color_type_id, cf.color_fill_hexa, c.color_id')
            ->join('color as c', 'g.color_id=c.color_id')
            ->join('color_type as ct', 'c.color_type_id=ct.color_type_id')
            ->join('color_fill as cf', 'cf.color_id=c.color_id')
            ->where('g.geojson_id', $arr['geojson_id'])
            ->get()->getRowArray();
        switch ($m['color_type_id']) {
            case '1':
                $colors = $m['color_fill_hexa'];
                break;
            case '2':
                $colors = $this->colorSet('multiple', ['color' => $m['color_id']]);
                break;
            case '3':
                $colors = $this->colorSet('legend', ['color' => $m['color_id'], 'lcode' => $arr['lcode']]);
                break;
            default:
                #code
                break;
        }
        return $colors;
    }
    public function colorSet($case, $data)
    {
        switch ($case) {
            case 'multiple':
                $colors = [];
                $m = $this->db->table('color as c')
                    ->select('color_fill_hexa')
                    ->join('color_fill as cf', 'cf.color_id=c.color_id')
                    ->where('c.color_id', $data['color'])
                    ->get()->getResultArray();
                foreach ($m as $key => $value) {
                    $colors[] = $value['color_fill_hexa'];
                }
                return $colors[array_rand($colors)];

                break;
            case 'legend':
                $m = $this->db->table('properties as p')
                    ->select('ps.properties_value')
                    ->join('properties_sub as ps', 'ps.properties_id=p.properties_id')
                    ->join('area_desakelurahan as kel', 'kel.desa_kelurahan_id=ps.desa_kelurahan_id')
                    ->where('p.is_legend', 1)
                    ->where('ps.properties_lcode', $data['lcode'])
                    ->get()->getRowArray();
                if (!$m) $m['properties_value'] = 0;
                $colors = $this->db->table('color as c')
                    ->select('cf.color_legend, cf.color_legend_max, cf.color_fill_hexa')
                    ->join('color_fill as cf', 'c.color_id=cf.color_id')
                    ->where('c.color_id', $data['color'])
                    ->get()->getResultArray();
                foreach ($colors as $key => $value) {
                    if ($value['color_legend'] != 0 && $value['color_legend_max'] == 0) {
                        if ($m['properties_value'] >= $value['color_legend']) {
                            return $value['color_fill_hexa'];
                        }
                    } else {
                        if ($m['properties_value'] >= $value['color_legend'] && $m['properties_value'] <= $value['color_legend_max']) {
                            return $value['color_fill_hexa'];
                        }
                    }
                }

                break;
            default:
                #legend
                break;
        }
    }
    public function getCards($table)
    {
        $i = $this->db->table($table)->countAllResults();
        return $i;
    }
    public function exelSave($arr)
    {
        foreach ($arr as $key => $value) {
            $lcode = $this->db->table('properties_sub')
                ->where('properties_lcode', $value['properties_lcode'])
                ->where('properties_id', $value['properties_id'])
                ->countAllResults();
            $value['desa_kelurahan_id'] = $this->db->table('area_desakelurahan')
                ->select('desa_kelurahan_id')
                ->where('desa_kelurahan_nama', $value['kelurahan_nama'])
                ->get()
                ->getRowArray()['desa_kelurahan_id'];
            unset($value['kelurahan_nama']);
            if ($lcode) {
                $set = $this->setCRUDIdentity('update', $value);
                $this->db->table('properties_sub')
                    ->where('properties_lcode', $value['properties_lcode'])
                    ->where('properties_id', $value['properties_id'])
                    ->set($set)
                    ->update();
            } else {
                $set = $this->setCRUDIdentity('insert', $value);
                $this->db->table('properties_sub')
                    ->set($set)
                    ->insert();
            }
        }
        $i = $this->db->affectedRows();
        return $i;
    }

    //Info Landing
    public function getInfoLandingForm($id)
    {
        $data = $this->db->table('info_landing')
            ->select('
            info_landing_id,
            info_landing_nama,
            info_landing_keterangan,
            info_landing_isi,
            ')
            ->where('info_landing_id', $id)
            ->get()
            ->getRowArray();
        return $data;
    }
    public function infoLandingSave($data)
    {
        $id = $data['info_landing_id'];
        unset($data['info_landing_id']);
        if ($id) {
            $set = $this->setCRUDIdentity('update', $data);
            $this->db->table('info_landing')
                ->where('info_landing_id', $id)
                ->set($set)
                ->update();
        } else {
            $set = $this->setCRUDIdentity('insert', $data);
            $this->db->table('info_landing')
                ->set($set)
                ->insert();
        }
        $i = $this->db->affectedRows();
        return $i;
    }
    public function infoLandingDel($id)
    {
        $this->db->table('info_landing')
            ->where('info_landing_id', $id)
            ->delete();
        $i = $this->db->affectedRows();
        return $i;
    }
    public function getInfoLanding()
    {
        $data = $this->db->table('info_landing')
            ->select('
                info_landing_nama,
                info_landing_keterangan,
                info_landing_isi,
                info_landing_seo
            ')
            ->get()
            ->getResultArray();
        return $data;
    }
}
