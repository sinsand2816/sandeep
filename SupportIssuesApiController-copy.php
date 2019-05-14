<?php
/**
 * SupportIssuesApiController
 *
 * To manage messages between gd and respective region related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2018 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\SupportIssuesRepository;
use Contus\Base\Controllers\Api\ApiController;

class SupportIssuesApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param GdStatuRepository $gdStatuRepository            
     */
    public function __construct(SupportIssuesRepository $supportissues) {
        parent::__construct ();
        $this->repository = $supportissues;
    }
    public function postImages(){
        $uploadDir = public_path('uploads/images');
        if (!empty($_FILES)) {
            $tmpFile = $_FILES['file']['tmp_name'];
            http_response_code(500);
            $filename = $uploadDir.'/'.time().'-'. preg_replace('/\s+/', '', $_FILES['file']['name']);
            $name = explode("/",$filename);
            move_uploaded_file($tmpFile,$filename);
            return end($name);
        }
        return '';
    }
}