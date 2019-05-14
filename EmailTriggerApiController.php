<?php
/**
 * EmailTriggerApiController
 *
 * To email template related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2017 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\EmailTriggerRepository;
use Contus\Base\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Mail;
use Admin\Mail\CreateIssue;
use Admin\Mail\SignUpNotification;
use Admin\Mail\SignUpNotificationHQ;
use Admin\Mail\SmmtoHqUpgrade;
use Admin\Mail\MmtoSmmUpgrade;
use PDF;


class EmailTriggerApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param EmailTriggerApiController $EmailTriggerApiController            
     */
    public function __construct(EmailTriggerRepository $emailTriggerRepository) {
        parent::__construct ();
        $this->repository = $emailTriggerRepository;
    }
    /**
     * This function used to send the parts report email as pdf
     *
     *            
     */
    public function sendPartsEmail(){
        if($this->request->email && $this->request->guestEmail == '' ){
            $email = $this->request->email;
            $gdName = $this->request->gdName;
            $this->repository->acknowledgementMail($email);
            $this->repository->mailToRc($this->request->rcMailIds, $gdName);
        }
        else if($this->request->guestEmail){
            $this->repository->sendPdf();
        }
    }
    /**
     * This function used to send the parts report email as pdf using curl
     *
     *            
     */
    public function sendServiceEmail(){
        if($this->request->email && $this->request->guestServiceEmail == ''){
            $email = $this->request->email;
            $gdName = $this->request->gdName;
            $this->repository->acknowledgementMail($email);
            $this->repository->mailToRc($this->request->rcMailIds, $gdName);
        }
        else if($this->request->guestServiceEmail){
            $this->repository->sendServiceReportPdf();
        }
    }
    /**
     * This functions used to send email when a user create a issue
     *
     * @return void
     */
    public function createIssue(){
        try{ 
            if($this->request->issue_type == 1)
            {
                $to = array(env('SANDEEP_MAIL'));
            }
            else{
                $to = $this->request->mailid;
            }
            Mail::to($to)->send(new CreateIssue($this->request->all()));
        }   
        catch(\Exception $e){
            return $e->getMessage();
        }
    }
    /**
     * Acknowledgement mail for signup users
     *
     * @return void
     */
    public function signupAcknowledgement(){
        try{ 
        $result = json_decode($this->request[0],true);
        $registeredEmailId = end($result);
        array_pop($result);
        foreach ($result as $email => $name) {
            Mail::to($email)->send(new SignUpNotification($registeredEmailId,$name));

        }
    }   
    catch(\Exception $e){
        return $e->getMessage();
    }
    }
    /**
     * Acknowledgement mail for smm sign up to HQ users
     *
     * @return void
     */
    public function signupAcknowledgementhq(){
        try{ 
        $result = json_decode($this->request[0],true);
        $registeredEmailId = end($result);
        array_pop($result);
        foreach ($result as $email => $name) {
            Mail::to($email)->send(new SignUpNotificationHQ($registeredEmailId,$name));

        }
    }   
    catch(\Exception $e){
        return $e->getMessage();
    }
    }
    /**
     * Acknowledgement mail for smm upgrade to HQ users
     *
     * @return void
     */
    public function smmtohqupgrade(){
        try{ 
        $result = json_decode($this->request[0],true);
        $registeredEmailId = end($result);
        array_pop($result);
        foreach ($result as $email => $name) {
            Mail::to($email)->send(new SmmtoHqUpgrade($registeredEmailId,$name));

        }
    }   
    catch(\Exception $e){
        return $e->getMessage();
    }
    }
    /**
     * Acknowledgement mail for mm upgrade to HQ users
     *
     * @return void
     */
    public function mmtosmmupgrade(){
        try{ 
        $result = json_decode($this->request[0],true);
        $registeredEmailId = end($result);
        array_pop($result);
        foreach ($result as $email => $name) {
            Mail::to($email)->send(new MmtoSmmUpgrade($registeredEmailId,$name));

        }
    }   
    catch(\Exception $e){
        return $e->getMessage();
    }
    }
}