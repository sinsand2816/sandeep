<?php
/**
 * GdServiceDataValidateApiController
 *
 * To manage service report data status related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2017 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\GdServiceDataValidateRepository;
use Contus\Base\Controllers\Api\ApiController;

class GdServiceDataValidateApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param GdServiceDataValidateRepository $gdServiceDataValidateRepository            
     */
    public function __construct(GdServiceDataValidateRepository $gdServiceDataValidateRepository) {
        parent::__construct ();
        $this->repository = $gdServiceDataValidateRepository;
    }
}