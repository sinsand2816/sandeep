<?php
/**
 * ChangePasswordApiController
 *
 * To manage password change related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2018 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Contus\Base\Controllers\Api\ApiController;
use Admin\Repositories\ChangePasswordRepository;

class ChangePasswordApiController extends ApiController {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    
    parent::__construct ();
      $this->repository = new ChangePasswordRepository();
    
  }
  /**
   * This function used to change the password
   */
  public function changePassword(){
      return $this->repository->changePassword();
  }
}
