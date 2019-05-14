<?php
/**
 * MpcApiController
*
* To manage MpcApiController
* @name       Cockpit - Daimler
* @version    1.0
* @author     Contus Team <developers@contus.in>
* @copyright  Copyright (C) 2017 Contus. All rights reserved.
* @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
*/

namespace Admin\Http\Controllers\Api;

use Illuminate\Http\Request;
use Contus\Base\Controllers\Api\ApiController;
use Admin\Repositories\HqDashboardRepository;

class HqDashboardApiController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct ();
        $this->repository = new HqDashboardRepository();
    }

    /**
     * Function is to get the datas for chart and report in MPC dashboard
     *
     * @return object
     */
    public function getDashboardData(){
        return $this->repository->getDashboardData();
    }
    
    /**
     * Function is to get report upload & not upload list of GD's
     *
     * @return object
     */
    public function getGdActivityTrackMap()
    {
        return $this->repository->getGdActivityTrackMap();
    }

}
