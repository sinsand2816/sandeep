<?php
/**
 * ServiceYearDataApiController
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

use Admin\Repositories\ServiceYearDataRepository;
use Contus\Base\Controllers\Api\ApiController;

class ServiceYearDataApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param ServiceYearDataRepository $serviceYearDataRepository            
     */
    public function __construct(ServiceYearDataRepository $serviceYearDataRepository) {
        parent::__construct ();
        $this->repository = $serviceYearDataRepository;
    }
}