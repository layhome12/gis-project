<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Utils extends BaseController
{
    public function get_layers()
    {
        $features = [];
        $layer = $this->layer->getLayers();
        foreach ($layer as $key => $val) {
            $load_file = base_url('/public/assets_geojson') . '/' . $val['geojson_file'];
            $geojson = file_get_contents($load_file);
            $jsondec = json_decode($geojson);
            foreach ($jsondec->features as $feature) {
                $feature->properties->color = $this->get_colors([
                    'lcode' => $feature->properties->LCODE,
                    'namobj' => $feature->properties->NAMOBJ,
                    'geojson_nama' => $val['geojson_nama'],
                    'geojson_id' => $val['geojson_id']
                ]);
                $feature->properties->labels = $this->get_labels([
                    'lcode' => $feature->properties->LCODE,
                    'namobj' => $feature->properties->NAMOBJ,
                    'geojson_nama' => $val['geojson_nama'],
                    'geojson_id' => $val['geojson_id']
                ]);
            }
            $features[] = $jsondec->features;
        }
        $this->SuccessRespon('Data Berhasil Diambil', $features);
    }
    public function get_select2()
    {
        $input = $this->input->getPost();
        $data = $this->utils->getSelect2Data([
            'table' => $input['table'],
            'where' => [$input['key'] => $input['id']]
        ]);
        $this->SuccessRespon('Data berhasil di ambil', $data);
    }
    public function get_labels($arr)
    {
        $data = $this->utils->getDataProperties($arr);
        $html = "<h6 class=\"text-uppercase\">$arr[geojson_nama] $arr[namobj]</h6>";
        if ($data) {
            $html .= "
            <span>Berikut informasi yang terdapat di area ini.</span>
            <table class=\"table table-striped\" style=\"width: 100%;\">
            <thead>
                <tr>
                    <th style=\"width: 40%;\" scope=\"col\">Data</th>
                    <th style=\"width: 30%;\" scope=\"col\">Tahun</th>
                    <th style=\"width: 30%;\" scope=\"col\">Value</th>
                </tr>
            </thead>
            <tbody>";
            foreach ($data as $row) {
                $html .= "
                    <tr>
                        <td style=\"width: 40%;\">$row[properties_label]</td>
                        <td style=\"width: 30%;\">$row[properties_tahun]</td>
                        <td style=\"width: 30%;\">$row[properties_value]</td>
                    </tr>";
            }
            $html .= "</tbody></table>";
        } else {
            $html .= "
            <div class=\"card\">
                <div class=\"card-body\">
                    Mohon maaf belum terdapat data di area ini.
                </div>
            </div>";
        }
        return $html;
    }
    public function get_colors($arr)
    {
        $color = $this->utils->getColors($arr);
        return $color;
    }
    public function is_add_color()
    {
        $id = $this->input->getPost('color_id');
        $data = $this->utils->colorTypeOptions($id);
        $this->SuccessRespon('Data Berhasil Diambil', $data);
    }
    public function get_legend()
    {
        $data = $this->layer->getLegend();
        $this->SuccessRespon('Data Berhasil Diambil', $data);
    }
}
