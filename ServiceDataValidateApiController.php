<?php
/**
 * ServiceDataValidateApiController
 *
 * To manage service report data validate related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2017 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\ServiceDataValidateRepository;
use Contus\Base\Controllers\Api\ApiController;

class ServiceDataValidateApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param ServiceDataValidateRepository $serviceDataValidateRepository            
     */
    public function __construct(ServiceDataValidateRepository $serviceDataValidateRepository) {
        parent::__construct ();
        $this->repository = $serviceDataValidateRepository;
    }
}