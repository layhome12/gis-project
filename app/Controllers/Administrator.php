<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \PhpOffice\PhpSpreadsheet\Reader\Xls;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\IOFactory;

class Administrator extends BaseController
{
    public function index()
    {
        $data['sidebar_active'] = [
            'menu' => 'dashboard',
            'child' => ''
        ];
        $data['card'] = [
            'layer' => $this->utils->getCards('geojson'),
            'properties' => $this->utils->getCards('properties'),
            'color' => $this->utils->getCards('color'),
            'user' => $this->utils->getCards('user')
        ];
        return view('administrator/dashboard/dashboard', $data);
    }

    //Layer
    public function layer()
    {
        $data['sidebar_active'] = [
            'menu' => 'maps',
            'child' => 'layer'
        ];
        return view('administrator/layer/layer', $data);
    }
    public function layer_fetch()
    {
        $this->datatables->search([
            'g.geojson_nama',
            'gt.geojson_type_nama',
            'g.geojson_file',
            'g.geojson_urutan',
            'g.geojson_id',
        ]);
        $this->datatables->select('
            g.geojson_nama,
            gt.geojson_type_nama,
            g.geojson_file,
            g.geojson_urutan,    
            g.geojson_id,
        ');
        $this->datatables->from('geojson as g');
        $this->datatables->join('geojson_type as gt', 'g.geojson_type_id=gt.geojson_type_id');
        $this->datatables->order_by('g.created_time', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[geojson_id]\" class=\"btn mr-1 btn-danger\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[geojson_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['geojson_id'] = "<div class=\"d-flex\">$button</div>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function layer_form()
    {
        $id = $this->input->getPost('id');
        $data['layer'] = $this->layer->getLayerForm($id);
        return view('administrator/layer/layer_form', $data);
    }
    public function layer_save()
    {
        $input = $this->input->getPost();
        $validate = $this->validate([
            'rules' => 'mime_in[geojson_file,application/json]|max_size[geojson_file,10240]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung GEOJSON dan Max 10 MB !');
        $file = $this->input->getFile('geojson_file');
        if ($file->isValid()) {
            $rname = $file->getRandomName();
            $input['geojson_file'] = $rname;
            $file->move(ROOTPATH . 'public/assets_geojson/', $rname);
        }
        $i = $this->layer->layerSave($input);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function layer_del()
    {
        $id = $this->input->getPost('id');
        $this->delFile(['directory' => 'public\\assets_geojson', 'table' => 'geojson', 'id' => $id]);
        $i = $this->layer->layerDel($id);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Properties
    public function properties()
    {
        $data['sidebar_active'] = [
            'menu' => 'maps',
            'child' => 'properties'
        ];
        return view('administrator/properties/properties', $data);
    }
    public function properties_fetch()
    {
        $this->datatables->search([
            'p.properties_nama',
            'p.properties_tahun',
            'p.properties_label',
            'p.is_legend',
            'p.properties_id'
        ]);
        $this->datatables->select('
            p.properties_nama,
            g.geojson_nama,
            p.properties_tahun,
            p.properties_label,
            p.is_legend,
            p.properties_id
        ');
        $this->datatables->from('properties as p');
        $this->datatables->join('geojson as g', 'p.geojson_id=g.geojson_id');
        $this->datatables->order_by('p.created_time', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_detail(this)\" target-id=" . str_encrypt($value['properties_id']) . " class=\"btn mr-1 btn-success\"><i class=\"far fa-eye\"></i></button>";
            $button .= "<button onclick=\"dt_temp(this)\" target-id=\"$value[properties_id]\" class=\"btn mr-1 btn-primary\"><i class=\"fa fa-download\"></i></button>";
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[properties_id]\" class=\"btn mr-1 btn-danger\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[properties_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['properties_id'] = "<div class=\"d-flex\">$button</div>";
            $m[$key]['is_legend'] = ($value['is_legend'] == 1) ? 'YES' : 'NO';
        }
        $this->datatables->render_no_keys($m);
    }
    public function properties_form()
    {
        $id = $this->input->getPost('id');
        $data['properties'] = $this->layer->getPropertiesForm($id);
        return view('administrator/properties/properties_form', $data);
    }
    public function properties_temp()
    {
        $id = $this->input->getGet('prop_id');
        $data = $this->layer->getPropertiesForm($id);
        $this->template_exel($data);
    }
    public function properties_save()
    {
        $input = $this->input->getPost();
        $i = $this->layer->propertiesSave($input);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function properties_del()
    {
        $id = $this->input->getPost('id');
        $i = $this->layer->propertiesDel($id);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Properties Sub
    public function properties_sub($id)
    {
        $data['properties_id'] = str_decrypt($id);
        $data['sidebar_active'] = [
            'menu' => 'maps',
            'child' => 'properties'
        ];
        return view('administrator/properties/properties_sub', $data);
    }
    public function properties_sub_fetch()
    {
        $id = $this->input->getPost('properties_id');
        $this->datatables->search([
            'kel.desa_kelurahan_nama',
            'ps.properties_lcode',
            'p.properties_label',
            'ps.properties_value',
            'ps.properties_sub_id'
        ]);
        $this->datatables->select('
            kel.desa_kelurahan_nama,
            ps.properties_lcode,
            p.properties_label,
            ps.properties_value,       
            ps.properties_sub_id
        ');
        $this->datatables->from('properties_sub as ps');
        $this->datatables->join('area_desakelurahan as kel', 'kel.desa_kelurahan_id=ps.desa_kelurahan_id');
        $this->datatables->join('properties as p', 'ps.properties_id=p.properties_id');
        $this->datatables->where('ps.properties_id', $id);
        $this->datatables->order_by('ps.created_time', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[properties_sub_id]\" class=\"btn mr-1 btn-danger\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[properties_sub_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['properties_sub_id'] = "<div class=\"d-flex\">$button</div>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function properties_sub_form()
    {
        $id = $this->input->getPost('id');
        $data['properties_id'] = $this->input->getPost('properties_id');
        $data['properties'] = $this->layer->getPropertiesSubForm($id);
        return view('administrator/properties/properties_sub_form', $data);
    }
    public function properties_sub_save()
    {
        $input = $this->input->getPost();
        $i = $this->layer->propertiesSubSave($input);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function properties_sub_import()
    {
        $validate = $this->validate([
            'rules' => 'mime_in[file_import,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]|max_size[file_import,3072]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung XLS, XLSX dan Max 3 MB !');
        $file = $this->input->getFile('file_import');

        if ($file->isValid()) {
            $ext = $file->guessExtension();
            $dir = $file->getTempName();
            $this->import_exel($ext, $dir);
        } else {
            $this->ErrorRespon('Tidak ada file yang diupload..');
        }
    }
    public function properties_sub_del()
    {
        $id = $this->input->getPost('id');
        $i = $this->layer->propertiesSubDel($id);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Color
    public function color()
    {
        $data['sidebar_active'] = [
            'menu' => 'maps',
            'child' => 'color'
        ];
        return view('administrator/color/color', $data);
    }
    public function color_fetch()
    {
        $this->datatables->search([
            'ct.color_type_nama',
            'c.color_nama',
            'c.color_id'
        ]);
        $this->datatables->select('
            ct.color_type_nama,
            c.color_nama,
            c.color_id
        ');
        $this->datatables->from('color as c');
        $this->datatables->join('color_type as ct', 'c.color_type_id=ct.color_type_id');
        $this->datatables->order_by('c.created_time', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_detail(this)\" target-id=" . str_encrypt($value['color_id']) . " class=\"btn mr-1 btn-success\"><i class=\"far fa-eye\"></i></button>";
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[color_id]\" class=\"btn mr-1 btn-danger\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[color_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['color_id'] = "<div class=\"d-flex\">$button</div>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function color_form()
    {
        $id = $this->input->getPost('id');
        $data['color'] = $this->layer->getColorForm($id);
        return view('administrator/color/color_form', $data);
    }
    public function color_save()
    {
        $input = $this->input->getPost();
        $i = $this->layer->colorSave($input);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function color_del()
    {
        $id = $this->input->getPost('id');
        $i = $this->layer->colorDel($id);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Color Sub
    public function color_sub($id)
    {
        $data['color_id'] = str_decrypt($id);
        $data['sidebar_active'] = [
            'menu' => 'maps',
            'child' => 'color'
        ];
        return view('administrator/color/color_sub', $data);
    }
    public function color_sub_fetch()
    {
        $id = $this->input->getPost('color_id');
        $this->datatables->search([
            'c.color_nama',
            'cf.color_fill_hexa',
            'cf.color_legend',
            'cf.color_legend_max',
            'cf.color_fill_id'
        ]);
        $this->datatables->select('
            c.color_nama,
            cf.color_fill_hexa,
            cf.color_legend,
            cf.color_legend_max,
            cf.color_fill_id
        ');
        $this->datatables->from('color_fill as cf');
        $this->datatables->join('color as c', 'c.color_id=cf.color_id');
        $this->datatables->where('cf.color_id', $id);
        $this->datatables->order_by('cf.created_time', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[color_fill_id]\" class=\"btn mr-1 btn-danger\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[color_fill_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['color_fill_id'] = "<div class=\"d-flex\">$button</div>";
            $m[$key]['color_fill_hexa'] = "<i class=\"fa fa-square\" style=\"color:$value[color_fill_hexa]; display: inline-block;\"></i> " . $value['color_fill_hexa'];

            if ($m[$key]['color_legend_max'] == 0 && $m[$key]['color_legend'] != 0) {
                $m[$key]['color_legend_max'] = $value['color_legend'] . '+';
            } else if ($value['color_legend_max'] != 0) {
                $m[$key]['color_legend_max'] = $value['color_legend'] . '-' . $value['color_legend_max'];
            } else {
                $m[$key]['color_legend_max'] = '-';
            }

            unset($m[$key]['color_legend']);
        }
        $this->datatables->render_no_keys($m);
    }
    public function color_sub_form()
    {
        $input = $this->input->getPost();
        $data['color'] = $this->layer->getColorSubForm($input['id']);
        $data['is_legend'] = $this->utils->colorTypeOptions($input['color_id']);
        $data['color_id'] = $input['color_id'];
        return view('administrator/color/color_sub_form', $data);
    }
    public function color_sub_save()
    {
        $input = $this->input->getPost();
        $i = $this->layer->colorSubSave($input);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function color_sub_del()
    {
        $id = $this->input->getPost('id');
        $i = $this->layer->colorSubDel($id);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Manajemen User
    public function manajemen_user()
    {
        $data['sidebar_active'] = [
            'menu' => 'setting',
            'child' => 'manajemen_user'
        ];
        return view('administrator/manajemen_user/manajemen_user', $data);
    }
    public function manajemen_user_fetch()
    {
        $this->datatables->search([
            'username',
            'user_nama',
            'user_tanggal_lahir',
            'user_tempat_lahir',
            'user_id'
        ]);
        $this->datatables->select('
            username,    
            user_nama,
            user_tanggal_lahir,
            user_tempat_lahir,
            user_id
        ');
        $this->datatables->from('user');
        $this->datatables->order_by('created_time', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[user_id]\" class=\"btn mr-1 btn-danger\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[user_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['user_id'] = "<div class=\"d-flex\">$button</div>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function manajemen_user_form()
    {
        $id = $this->input->getPost('id');
        $data['user'] = $this->user->getUserForm($id);
        return view('administrator/manajemen_user/manajemen_user_form', $data);
    }
    public function manajemen_user_save()
    {
        $input = $this->input->getPost();
        $validate = $this->validate([
            'rules' => 'mime_in[user_img,image/png,image/jpg,image/jpeg]|max_size[user_img,5120]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung JPG, JPEG, PNG dan Max 512 KB !');
        $file = $this->input->getFile('user_img');
        if ($file->isValid()) {
            $rname = $file->getRandomName();
            $input['user_img'] = $rname;
            $file->move(ROOTPATH . 'public/users_img/', $rname);
        }
        if ($input['password'] == '') unset($input['password']);
        if (isset($input['password'])) $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
        $i = $this->user->userSave($input);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function manajemen_user_del()
    {
        $id = $this->input->getPost('id');
        $this->delFile(['directory' => 'public\\users_img', 'table' => 'user', 'select' => 'user_img', 'id' => $id]);
        $i = $this->user->userDel($id);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Info Landing
    public function info_landing()
    {
        $data['sidebar_active'] = [
            'menu' => 'info_landing',
            'child' => ''
        ];
        return view('administrator/info_landing/info_landing', $data);
    }
    public function info_landing_fetch()
    {
        $this->datatables->search([
            'info_landing_nama',
            'info_landing_keterangan',
            'info_landing_id'
        ]);
        $this->datatables->select('
            info_landing_nama,
            info_landing_keterangan,
            info_landing_id
        ');
        $this->datatables->from('info_landing');
        $this->datatables->order_by('created_time', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[info_landing_id]\" class=\"btn mr-1 btn-danger\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[info_landing_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['info_landing_id'] = "<div class=\"d-flex\">$button</div>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function info_landing_form()
    {
        $id = $this->input->getPost('id');
        $data['info'] = $this->utils->getInfoLandingForm($id);
        return view('administrator/info_landing/info_landing_form', $data);
    }
    public function info_landing_save()
    {
        $input = $this->input->getPost();
        $input['info_landing_seo'] = url_title(strtolower($input['info_landing_nama']));
        $i = $this->utils->infoLandingSave($input);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function info_landing_del()
    {
        $id = $this->input->getPost('id');
        $i = $this->utils->infoLandingDel($id);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Import Exel
    public function import_exel($case = '', $dir = '')
    {
        switch ($case) {
            case 'xls':
                $exel = new Xls();
                break;
            case 'xlsx':
                $exel = new Xlsx();
                break;
            default;
                $exel = new Xlsx();
                break;
        }
        $arr = [];
        $load = $exel->load($dir);
        $prop_id = $load->getActiveSheet()->toArray()[1][0];
        $data = $load->getActiveSheet()->toArray();
        foreach ($data as $key => $value) {
            if ($key > 6) {
                $arr[] = [
                    'properties_id' => $prop_id,
                    'kelurahan_nama' => $value[1],
                    'properties_lcode' => $value[2],
                    'properties_value' => $value[3]
                ];
            }
        }
        $i = $this->utils->exelSave($arr);
        if (!$i) $this->ErrorRespon('Server sedang dalam perbaikan !');
        $this->SuccessRespon('Import Data Exel Berhasil');
    }
    //Template Download
    public function template_exel($data)
    {
        $dir = ROOTPATH . '\\public\\assets_exel\\template_exel.xlsx';
        $spreadsheet = IOFactory::load($dir);
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->getCell('A2')->setValue($data['properties_id']);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . url_title($data['properties_nama']) . '.xlsx');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
