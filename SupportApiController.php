<?php
/**
 * SupportApiController
 *
 * To manage messages between gd and respective region related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2018 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\SupportRepository;
use Contus\Base\Controllers\Api\ApiController;

class SupportApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param GdStatuRepository $gdStatuRepository            
     */
    public function __construct(SupportRepository $support) {
        parent::__construct ();
        $this->repository = $support;
    }
    public function show($id){
        return $this->repository->show($id);
    }
}