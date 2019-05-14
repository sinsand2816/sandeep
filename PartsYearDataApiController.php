<?php
/**
 * PartsYearDataApiController
 *
 * To manage parts year wise report activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2018 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\PartsYearDataRepository;
use Contus\Base\Controllers\Api\ApiController;

class PartsYearDataApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param PartsYearDataRepository $partsYearDataRepository            
     */
    public function __construct(PartsYearDataRepository $partsYearDataRepository) {
        parent::__construct ();
        $this->repository = $partsYearDataRepository;
    }
}