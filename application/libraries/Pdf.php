<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 *
 * @packge        CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 * @author        Ardianta Pargo
 * @license        MIT License
 * @link        https://github.com/ardianta/codeigniter-dompdf
 */
use Dompdf\Dompdf;

class Pdf extends Dompdf {

    public $filename;

    public function __construct() {
        parent::__construct();
        $this->filename = "laporan.pdf";

        // enable external CSS/images
        $this->set_option('isRemoteEnabled', true);
        $this->setPaper('A4', 'portrait');
    }

    protected function ci() {
        return get_instance();
    }

    public function load_view($view, $data = array()) {
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->load_html($html);
        $this->render();
        ob_end_clean();
        $this->stream($this->filename, array("Attachment" => false));
    }
}