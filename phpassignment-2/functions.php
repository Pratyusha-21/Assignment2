<?php
    require ("vendor/autoload.php");

    /**
     * Help to get data and images from the json file.
     * 
     */
    class CallApi {
        // Stores all the data elements.
        public $arr; 

        /**
         * @var $client creates an object of GuzzleHTTP.
         * @var $host stores the hostname. 
         * @var $response stores response after making GET request.
         * @var $body  
         * @var $arr stores the response in array format.
         */
        function __construct() {
            $client = new \GuzzleHttp\Client();                                    
            $host = 'https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services';  
            $response = $client->request('GET', $host);
            $body = $response->getBody();
            $arr = json_decode($body,TRUE);
            $this->arr = $arr;
            
        }

        /**
         * Gives the count of data items present in json file.
         * 
         * @return int 
         *    number of data items.
         */
        function arrLength() {
            return count($this->arr['data']);
        }

        /**
         * Checks whether the field services are null or not.
         * 
         *   @param int $i data element that is being accessed.
         *   @return boolean 
         *     if null then returns true.
         */
        function checkNull(int $i) {
            if ($this->arr['data'][$i]['attributes']['field_services'] == null) {
                return TRUE;
            }
            return FALSE;
        }

        /**
         * Takes the list items from the json file where field service is not null.
         * 
         *   @var int $i data element that is being accessed.
         *   @return string
         *     the list from json file.
         */
        function list(int $i) {
            return $this->arr['data'][$i]['attributes']['field_services']['processed'];
        }

        /**
         * Takes the image from the json file where field service is not null.
         * 
         *   @param int $i data element that is being accessed.
         *   @return string 
         *      returns image.
         */
        function image(int $i) {
            $img = $this->arr['data'][$i]['relationships']['field_image']['links']['related']['href'];
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $img);
            $body = $response->getBody();
            $img_link = json_decode($body, TRUE);
            $img_arr = $img_link['data']['attributes']['uri']['url'];
            return $img_arr;
        }

        /**
         * Takes the title from the json file where field service is not null. 
         *  
         *   @param int $i data element that is being accessed.
         *   @return string
         *     the title from json file.  
         */
        function title(int $i) {
            return $this->arr['data'][$i]['attributes']['title'];
             
        }
    }

?>

