<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 *
 * @package        CodeIgniter
 * @subpackage     Libraries
 * @category       Libraries
 * @author         Ardianta Pargo
 * @license        MIT License
 * @link           https://github.com/ardianta/codeigniter-dompdf
 */

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf extends Dompdf {
    /**
     * PDF filename
     * @var String
     */
    public $filename;

     public function __construct() {
        // Set DomPDF options
        $options = new Options();
        $options->set('isRemoteEnabled', true); // allow file:// and external URLs
        $options->set('defaultFont', 'Helvetica'); // optional default font

        // Pass options to Dompdf constructor
        parent::__construct($options);

        $this->filename = "laporan.pdf";
    }

    /**
     * Get an instance of CodeIgniter
     *
     * @access protected
     * @return object
     */
    protected function ci() {
        return get_instance();
    }

    /**
     * Load a CodeIgniter view into domPDF
     *
     * @access public
     * @param  string $view  The view to load
     * @param  array  $data  The view data
     * @return void
     */
    public function load_view($view, $data = array()) {
        $html = $this->ci()->load->view($view, $data, true);
        $this->loadHtml($html);
        $this->render();
        $this->stream($this->filename, array("Attachment" => false)); // false = inline preview
    }
}
