<?php

/**
 * QprApiController
 *
 * To manage QPR related API activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2017 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\QprRepository;
use Contus\Base\Controllers\Api\ApiController;
use Illuminate\Support\Facades\DB;
use Admin\Http\Controllers\Controller;
use Admin\Models\Mpc;

class QprApiController extends ApiController {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(QprRepository $qprrepository) {
        parent::__construct ();
        $this->repository = $qprrepository;
    }
    /**
     * To retrieve all the data from excel.
     *
     * @return void
     */
    public function handlefile(){
        if($this->request->has('uploadname')){
        return $this->repository->retrieveDataFromExcel();
        }        
    }
    /**
     * To get all the general distributors list.
     *
     * @return void
     */
    public function getgdlist(){
        return $this->repository->getgdlist();


    }
    /**
     * To get all the cumulative report of qpr.
     *
     * @return void
     */
    public function viewqprreport(){
       return $this->repository->viewqprreport();              
    }
    /**
     * To get the single region data.
     *
     * @return void
     */
    public function gdInfo(){
       return $this->repository->gdInfo();
       
    }
    /**
     * To list all the region.
     *
     * @return void
     */
    public function allregion(){
       return $this->repository->allregion();       
    }
    
    /**
     *  Function used to generate qpr char
     *  
     *  @return \Illuminate\Http\Response
     */
    public function chartView() {
        
        return $this->repository->chartView();
    }
    /**
     *  Function used to get qpr data to edit
     *  
     *  @return \Illuminate\Http\Response
     */
     public function getQprData($id,$month) {
        
        return $this->repository->editQprData($id,$month);
    }
     /**
     *  Function used to get qpr data 
     *  
     *  @return \Illuminate\Http\Response
     */
    public function getPreviousMonthData($id,$month) {
       
        return $this->repository->getPreviousMonthData($id,$month);
    }
    /**
     *  Function used to get qpr default data
     *  
     *  @return \Illuminate\Http\Response
     */
     public function getDefaultQpr($id) {
        return $this->repository->getDefaultQpr($id);
    }
}