<?php
/**
 * CategoryApiController
 *
 * To manage the video category related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2018 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\CategoryRepository;
use Contus\Base\Controllers\Api\ApiController;

class CategoryApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param CategoryRepository $ategoryRepository            
     */
    public function __construct(CategoryRepository $category_repository) {
        parent::__construct ();
        $this->repository = $category_repository;
    }
}