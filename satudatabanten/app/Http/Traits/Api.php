<?php
namespace App\Http\Traits;

trait Api {

    protected $method = '';
    protected $data_get = array();
    protected $data_post = array();
    protected $data_header = array();
    protected $data_body = '';

    protected $ws_base_url = '';

    function __construct() {
        $this->ws_base_url = env('BASE_API').'api/'.env('OUTPUT_API');
        $this->clearParam('header');
    }

    public function clearParam($method) {
        if($method=='post') {
            $this->data_post = array();
        } else if($method=='get') {
            $this->data_get = array();
        } else if($method=='header') {
            $this->data_header = array(
                'x-api-key'     => 'aHR0cHM6Ly93d3cuYmFudGVucHJvdi5nby5pZC8='
            );
        }  else if($method=='body') {
            $this->data_body = '';
        }
    }

    public function setParamGet($key, $value) {
        $this->data_get[$key] = $value;
    }

    public function setParamPost($key, $value) {
        $this->data_post[$key] = $value;
    }

    public function setParamHeader($key, $value) {
        $this->data_header[$key] = $value;
    }

    public function setParamBody($value) {
        $this->data_body = $value;
    }

    public function clearMethod() {
        $this->method = '';
    }

    public function setMethod($value) {
        $this->method = $value;
    }

    public function doRead($request='get') {
        $data = array();
        $url = $this->ws_base_url.$this->method;
        if(count($this->data_get)>0) {
            $url .= ((strpos($url, '?') === false)?'?':'&').http_build_query($this->data_get);
        }
        if($request=='post') {
            $res = $this->curlPost($url, http_build_query($this->data_post));
            $data = json_decode($res);
        } else {
            $res = $this->curlGet($url);
            $data = json_decode($res);
        }

        $output = array(
            'status'	=> 0,
            'message'	=> "Something when wrong"
        );
        if(is_object($data)) {
            if(isset($data->results)) {
                $output = array(
                    'status'	=> 1,
                    'message'	=> '',
                    'results'	=> $data->results
                );
            }
        }
        return $output;
    }

    private function curlPost($url, $post_data, $ref = '') {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 2);

        $ssl = false;
        if (preg_match('/^https/i', $url)) {
            $ssl = true;
        }
        if ($ssl) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        if ($ref == '') {
            $ref = $url;
        }

        $header = array();
        foreach($this->data_header as $keyHeader => $valueHeader) {
            $header[] = $keyHeader.': '.$valueHeader;
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $ref);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 400);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    private function curlGet($url, $ref = '') {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 2);

        $ssl = false;
        if (preg_match('/^https/i', $url)) {
            $ssl = true;
        }
        if ($ssl) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        if ($ref == '') {
            $ref = $url;
        }

        $header = array();
        foreach($this->data_header as $keyHeader => $valueHeader) {
            $header[] = $keyHeader.': '.$valueHeader;
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $ref);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 400);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

}