<?php
/**
 * VideoApiController
 *
 * To manage the videos related activities
 *
 * @name       Cockpit - Daimler
 * @version    1.0
 * @author     Contus Team <developers@contus.in>
 * @copyright  Copyright (C) 2018 Contus. All rights reserved.
 * @license    GNU General Public License http://www.gnu.org/copyleft/gpl.html
 */
namespace Admin\Http\Controllers\Api;

use Admin\Repositories\VideoRepository;
use Contus\Base\Controllers\Api\ApiController;

class VideoApiController extends ApiController {
    
    /**
     * Class initializer
     *
     * @param VideoRepository $video_repository            
     */
    public function __construct(VideoRepository $video_repository) {
        parent::__construct ();
        $this->repository = $video_repository;
    }
    /**
     * This method is used to post the videos
     */
    public function postVideos(){
        $uploadDir = public_path('videos');
        if (!file_exists($uploadDir)) {
            mkdir(public_path() . 'videos', 0777,true);
        }
        if (!empty($_FILES)) {
            $tmpFile = $_FILES['file']['tmp_name'];
            $filename = $uploadDir.'/'.time().'-'. preg_replace('/\s+/', '', $_FILES['file']['name']);
            $name = explode("/",$filename);
            move_uploaded_file($tmpFile,$filename);
            return end($name);
        }
        return '';
    }
    /**
     * This method is used to get all the related videos
     */
    public function getAllVideos(){
        return $this->repository->getAllVideos();
    }
    /**
     * This method is used to delete single video
     */
    public function deleteVideo($id){
        return $this->repository->deleteVideo($id);
            
    }
    
}