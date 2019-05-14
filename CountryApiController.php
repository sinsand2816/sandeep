<?php
/**
 * CountryApiController
 *
 * To manage country related activities
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2017 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */

namespace Admin\Http\Controllers\Api;

use Illuminate\Http\Request;
use Admin\Http\Controllers\Controller;
use Contus\Base\Controllers\Api\ApiController;
use Admin\Models\GeneralDistributor;
use Contus\Base\Traits\ResponseHandler;
use Admin\Repositories\CountryRepository;

class CountryApiController extends ApiController
{
    use ResponseHandler;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct ();
        $this->country = new CountryRepository();
    }
    
    /**
     * Function is used to get country list with respective currecy details
     * 
     * @return object
     */
    public function getCountryWithCurrency() {
        $id = app()->make('authUser')->id;
        $roleId = app()->make('authUser')->user_role_id;
        if($roleId == ROLE_GD) {
            $gdWithCurrency = GeneralDistributor::getGdWithCurrency($id);
            $selectedCurrencyCode = $gdWithCurrency->code;
            $countryList = [$gdWithCurrency];
        }
        else {
            $selectedCurrencyCode = config('report.currency.code');
            /* Get list of currencies */
            $countryList = $this->country->getCurrencyList();
        }

        $sorted = collect($countryList)->SortBy('name');
        $output = array(
                'countries' => $sorted->values()->all(),
                'selectedCurrencyCode' => $selectedCurrencyCode
        );
        return $this->getSuccessJsonResponse ( $output );
    }
}
