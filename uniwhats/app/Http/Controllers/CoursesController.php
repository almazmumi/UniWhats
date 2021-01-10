<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use PHPHtmlParser\Dom;
use Illuminate\Support\Facades\Cache;

class CoursesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    function getCourses($dept){
    

        return Cache::remember('courses'.$dept ,now()->addDays(10), function () use($dept) {
            $client = new Client();
            $response = $client->request("GET", "https://registrar.kfupm.edu.sa/CourseOffering");
            $responeBody = $response->getBody()->getContents();
            $dom = new Dom;
            $dom->loadStr($responeBody);
            $result["viewState"] = $dom->find('#__VIEWSTATE')->getAttribute('value');
            $result["viewStateGenrator"] = $dom->find('#__VIEWSTATEGENERATOR')->getAttribute('value');
            $result["eventValidation"] = $dom->find('#__EVENTVALIDATION')->getAttribute('value');
            
            $response1 = $client->request('POST', 'https://registrar.kfupm.edu.sa/CourseOffering', [
                'form_params' => [
                    '__EVENTTARGET' => 'ctl00$CntntPlcHldr$ddlDept',
                    '__VIEWSTATE' => $result["viewState"],
                    '__VIEWSTATEGENERATOR' => $result["viewStateGenrator"],
                    '__EVENTVALIDATION' => $result["eventValidation"],
                    'ctl00$CntntPlcHldr$ddlTerm' => '202020',
                    'ctl00$CntntPlcHldr$ddlDept' => $dept,
                ]
            ]);
    
            $dom1 = new Dom;
            $dom1->loadStr($response1->getBody()->getContents());
            $contents = $dom1->find('.trow');
            $courses = array();
            foreach ($contents as $content){
                $dump = explode("-", $content->firstChild()->firstChild()->nextSibling()->innerHtml);
                if(!array_key_exists($dump[0], $courses)){
                    $courses[$dump[0]] = [$dump[1]];  
                }else{
                    array_push($courses[$dump[0]],$dump[1]) ;
                }
                
            }
            return $courses;
        });
    
    }
}
