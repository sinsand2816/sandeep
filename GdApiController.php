<?php
/**
 * GdApiController
 *
 * To manage GdApiController
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2017 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */

namespace Admin\Http\Controllers\Api;

use Illuminate\Http\Request;
use Contus\Base\Controllers\Api\ApiController;
use Admin\Repositories\GdRepository;
use Admin\Models\GeneralDistributor as Gd;
use Admin\Models\Mpc;

class GdApiController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GdRepository $GdRepository) {
        parent::__construct ();
        $this->repository = $GdRepository;
    }
    
    /**
     * To list all the General Distributors.
     *
     * @return object
     */
    public function getList(){
        $id = app()->make('authUser')->id;
        $roleId = app()->make('authUser')->user_role_id;
        switch ($roleId) {
            case '1':
                $gds = Gd::with('country','organization')->get();
                break;
            case '2':
                 $mpc = Mpc::where('user_id', $id )->first();
                 $gds = Gd::with('country','organization')->where('mpc_id', $mpc->id)->get();
                break;
            case '4':
                $mpcList = Mpc::where ( 'user_id', $id )->get()->toArray();
                $mpcId = [$mpcList[0]['rc_parent_id']];
                $gds = Gd::with('country','organization')->where('mpc_id', $mpcId[0])->get();
                break;
            case '5':
                $gds = Gd::with('country','organization')->get();
                break;
            default:
        }
        return $gds;
    }

    /**
     * Function is used to get QSR report details for dashboard.
     *
     * @return object
     */
    public function dashboardQsrReport()
    {
        return $this->repository->dashboardQsrReport();
    }
    /**
     * Function is used to get QPR report details for dashboard.
     *
     * @return object
     */
    public function dashboardQprReport()
    {
        return $this->repository->dashboardQprReport();
    }
}
