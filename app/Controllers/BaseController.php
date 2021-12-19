<?php

namespace App\Controllers;

use App\Libraries\Datatables;
use App\Models\MLayer;
use App\Models\MUser;
use App\Models\MUtils;
use CodeIgniter\Config\Services;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        helper(['ssl', 'str']);

        // Libs
        $this->datatables = new Datatables();
        $this->input = Services::request();
        $this->session = Services::session();

        //Models
        $this->layer = new MLayer();
        $this->utils = new MUtils();
        $this->user = new MUser();
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
    public function delFile($arr = [])
    {
        $file = $this->utils->getData([
            'table' => $arr['table'],
            'select' => isset($arr['select']) ? $arr['select'] : $arr['table'] . '_file',
            'where' => [$arr['table'] . '_id' => $arr['id']]
        ])[isset($arr['select']) ? $arr['select'] : $arr['table'] . '_file'];
        $dir = ROOTPATH . $arr['directory'] . '\\' . $file;
        if (unlink($dir)) return true;
    }
}
