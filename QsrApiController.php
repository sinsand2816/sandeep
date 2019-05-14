<?php
/**
 * QsrApiController
 *
 * To manage QSR related API activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2017 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\QsrRepository;
use Contus\Base\Controllers\Api\ApiController;

class QsrApiController extends ApiController {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(QsrRepository $qsrrepository) {
        parent::__construct ();
        $this->repository = $qsrrepository;
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
     * To retrieve all the data from excel.
     *
     * @return void
     */
    public function handleqsrfile(){
    return $this->repository->retrieveDataFromqsrExcel();
    }
    /**
     * To view all the cumulative data from database.
     *
     * @return void
     */
    public function viewqsrreport(){
        return $this->repository->viewqsrreport();
    }
    /**
     *  Function used to get qsr data to edit
     *  
     *  @return \Illuminate\Http\Response
     */
     public function getQsrData($id,$month) {
        return $this->repository->editQsrData($id,$month);
    }
    /**
     *  Function used to get qsr default data
     *  
     *  @return \Illuminate\Http\Response
     */
     public function getDefaultQsr($id) {
        return $this->repository->getDefaultQsr($id);
    }
    /**
     * To get previous month data of requested month and id
     *
     * @param [type] $id
     * @param [type] $month
     * @return array
     */
    public function getPreviousMonthData($id,$month) {
         return $this->repository->getPreviousMonthData($id,$month);
     }
     /**
     * To get previous months data of vehicle sales and service contract sold values for the requested month and id
     *
     * @param [type] $id
     * @param [type] $month
     * @return array
     */
     public function getServiceContract($id,$month){
        return $this->repository->getServiceContract($id,$month);
     }
}