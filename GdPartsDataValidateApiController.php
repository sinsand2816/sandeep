<?php
/**
 * GdPartsDataValidateApiController
 *
 * To manage parts report data status related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2017 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\GdPartsDataValidateRepository;
use Contus\Base\Controllers\Api\ApiController;

class GdPartsDataValidateApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param GdStatuRepository $gdStatuRepository            
     */
    public function __construct(GdPartsDataValidateRepository $gdPartsDataValidateRepository) {
        parent::__construct ();
        $this->repository = $gdPartsDataValidateRepository;
    }
}