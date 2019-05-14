<?php
/**
 * GdUsersApiController
 *
 * To manage GdUsersApiController
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2018 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\GdUsersRepository;
use Contus\Base\Controllers\Api\ApiController;

class GdUsersApiController extends ApiController {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GdUsersRepository $GdUserRepository) {
        parent::__construct ();
        $this->repository = $GdUserRepository;
    }
    /**
     * This function used to set the user status as active
     */
    public function setActive($id){
        return $this->repository->setActive($id);
    }
    /**
     * This function is used to delete the signuped user
     */
    public function deleteSignupUser($id){
        return $this->repository->deleteSignupUser($id);
    }
}
