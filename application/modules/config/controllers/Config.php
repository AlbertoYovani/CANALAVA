<?php

/**
 * Description of Config
 *
 * @author felipe de jesus <itifjpp@gmail.com>
 */

class Config extends MX_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('config/config_mdl');
        error_reporting(0);/*EVITAR QUE SALGAN ERRORES COMO POR EJEMPLO VARIABLES NO DEFINIDAS Y OTROS ERRORES TIPO WARNING*/
    }
    
    public function setOutput($json) {
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    } 
    public function html5ImageUpload() {
        $url_sav = $_GET['tipo'];
        $dir = 'assets/' .$url_sav . '/';
        $serverdir = $dir;
        $tmp = explode(',', $_POST['data']);
        $imgdata = base64_decode($tmp[1]);
        $extension = strtolower(end(explode('.', $_POST['name'])));
        $filename = substr($_POST['name'], 0, -(strlen($extension) + 1)) . '.' . substr(sha1(time()), 0, 6) . '.' . $extension;
        $handle = fopen($serverdir . $filename, 'w');
        fwrite($handle, $imgdata);
        fclose($handle);
        $response = array(
            "status" => "success",
            "url" => $filename . '?' . time(),
            "filename" => $filename
        );
        $this->setOutput($response);
    }
}
