<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Group;
use GuzzleHttp\Client;
use PHPHtmlParser\Dom;


class LinksValidator implements Rule
{
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $message = "";
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $group = Group::where('url', '=', $value)->first();
        if($group){
            $this->message = "The group link is already linked with the course " . $group->courseCode . ".";
            return false;
        }else{
            $client = new Client();
            $response = $client->request("GET", $value);
            $responeBody = $response->getBody()->getContents();
            $dom = new Dom;
            $dom->loadStr($responeBody);
            $result = $dom->find('._2yyk._8cis ._2yzk')[0];
            if($result->text == ""){
                $this->message = "It appears that the group link is invalid";
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
