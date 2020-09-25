<?php

    class Curl {

        public $request     = 'null';
        public $postdata    = 'null';

        public function __construct(){}

        public function Send()
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->request);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.0.1) Gecko/2008070208');
            curl_setopt($ch, CURLOPT_TIMEOUT, 300);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_FAILONERROR, 1);
            curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postdata);

            $header['content'] = curl_exec($ch);
            $header['err']     = curl_errno($ch);
            $header['errmsg']  = curl_error($ch);
            $header['header']  = curl_getinfo($ch);
            curl_close($ch);
            
            return $header;
        }

    };

?>
