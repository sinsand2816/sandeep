<?php
/**
 * PartsDataValidateApiController
 *
 * To manage parts report data validate related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2017 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\PartsDataValidateRepository;
use Contus\Base\Controllers\Api\ApiController;

class PartsDataValidateApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param PartsDataValidateRepository $partsDataValidateRepository            
     */
    public function __construct(PartsDataValidateRepository $partsDataValidateRepository) {
        parent::__construct ();
        $this->repository = $partsDataValidateRepository;
    }
}