<?php
/**
 * SignupApiController
 *
 * To manage user signup activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2018 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Contus\Base\Controllers\Api\ApiController;
use Illuminate\Http\Response;
use Admin\Models\Country;
use Admin\Models\Currency;
use Illuminate\Support\Facades\DB;
use Admin\Models\User;
use Admin\Models\Region;
use Admin\Models\Organization;
use Admin\Repositories\SignupRepository;
use Admin\Models\GeneralDistributor;
use Admin\Models\QprReport;
use Admin\Models\QsrReport;

class SignupApiController extends ApiController {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SignupRepository $signupRepo ) {
    parent::__construct ();
    $this->country = new Country();
    $this->currency = new Currency();
    $this->user = new User();
    $this->region = new Region();
    $this->organization = new Organization();
    $this->repository = $signupRepo;
    $this->gd = new GeneralDistributor();
    $this->parts = new QprReport();
    $this->service = new QsrReport();

    }
    /**
     * This method used to list all the countries 
     * 
     * @return array
     */
    public function countryList(){
        $sorted = $this->country->select('id','country_name')->get()->sortBy('country_name');
        return $sorted->values()->all();
    }
    /**
     * This method used to list the currency according to the country id
     * 
     * @param {$countryId}
     * @return array
     */
    public function currencyList($countryId){
        return $this->currency->select('id','name','code')->where('country_id',$countryId)->get();
    }
     /**
     * This method used to send link for forgot password
     *      
     * @return array
     */
    public function sendForgotPasswordLink(){
        return $this->repository->sendForgotPasswordLink();
    }
    /**
     * This method used to reset the password
     *      
     * @return array
     */
    public function resetPassword(){
        return $this->repository->resetPassword();
    }
    /**
     * This method used to list all the regions 
     * 
     * @return array
     */
    public function regionlist(){
        if($this->request->all()){
            $id = array_flatten($this->request->all());
            $sorted =  $this->region->select('id','region')->whereIn('id',$id)->where('status',1)->get()->sortBy('region');
        }else{
        $sorted =  $this->region->select('id','region')->where('status',1)->get()->sortBy('region');
        }
        return $sorted->values()->all();
    }
    /**
     * This method used to list the organizations based on the region
     * 
     * @return array
     */
    public function organization($id){
        $sorted =  $this->organization->select('id','name')->where('region_id',$id)->get()->sortBy('name');
        return $sorted->values()->all();

  }
   /**
     * This method used to list all the organizations 
     * 
     * @return array
     */
    public function organizationList(){
        if($this->request->all()){
            $regionIds = array_flatten($this->request->all());
            $sorted = $this->organization->select('id','name')->whereIn('region_id',$regionIds)->get()->sortBy('name');
            return $sorted->values()->all();
        }else{
            $sorted =  $this->organization->select('id','name')->get()->sortBy('name');
            return $sorted->values()->all();
        }
    }
     /**
     * This method used to list all the selected organizations for parts
     * 
     * @return array
     */
    public function organizationNameParts(){
            $fromDate = formatMonthPickDate($this->request->from);
            $toDate = formatMonthPickDate($this->request->to);
            if($this->request->selectedOrg){
                $gdIds = array_pluck($this->gd->select('id')->whereIn('organization_id',$this->request->selectedOrg)->get()->toArray(),'id');
                $uploadedGds = array_pluck($this->parts->select('general_distributor_id')
                ->where('report_status_id','=',APPROVED)
                ->whereBetween('report_month', [$fromDate,$toDate])
                ->whereIn('general_distributor_id',$gdIds)->groupBy('general_distributor_id')->get()->toArray(),'general_distributor_id');
                $orgIds = array_pluck($this->gd->select('organization_id')->whereIn('id',$uploadedGds)->get()->toArray(),'organization_id');
                $sorted = $this->organization->select('name')->whereIn('id',$orgIds)->get()->sortBy('name');
                return $sorted->values()->all();
                }
            }
    /**
     * This method used to list all the selected organizations for service
     * 
     * @return array
     */        
    public function organizationNameService(){
        $fromDate = formatMonthPickDate($this->request->from);
        $toDate = formatMonthPickDate($this->request->to);
        if($this->request->selectedOrg){
            $gdIds = array_pluck($this->gd->select('id')->whereIn('organization_id',$this->request->selectedOrg)->get()->toArray(),'id');
            $uploadedGds = array_pluck($this->service->select('general_distributor_id')
            ->where('report_status_id','=',APPROVED)
            ->whereBetween('report_month', [$fromDate,$toDate])
            ->whereIn('general_distributor_id',$gdIds)->groupBy('general_distributor_id')->get()->toArray(),'general_distributor_id');
            $orgIds = array_pluck($this->gd->select('organization_id')->whereIn('id',$uploadedGds)->get()->toArray(),'organization_id');
            $sorted =  $this->organization->select('name')->whereIn('id',$orgIds)->get()->sortBy('name');
            return $sorted->values()->all();
            }
        }
        
    public function regionName(){
        if($this->request->all()){
            $sorted = $this->region->select('region')->whereIn('id',$this->request->all())->get()->sortBy('region');
            return $sorted->values()->all();
        }else{
            $sorted =  $this->region->select('region')->get()->sortBy('region');
            return $sorted->values()->all();
        }
        
    }
}