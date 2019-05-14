<?php
/**
 * CurrencyConverterController
 *
 * To manage admin user related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2017 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\CurrencyConverterRepository;
use Contus\Base\Controllers\Api\ApiController;

class CurrencyConverterController extends ApiController {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct(CurrencyConverterRepository $CurrencyConverterRepository) {
    parent::__construct ();
    $this->ccRepo = $CurrencyConverterRepository;
  }
  
}
