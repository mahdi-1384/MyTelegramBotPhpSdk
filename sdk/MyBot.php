<?php

require __DIR__ . '/CurlHelper.php';
require __DIR__ . '/ResponseException.php';
require __DIR__ . '/model/Message.php';

class MyBot {
    private $baseUrl;

    public function __construct($token) {
        $this->baseUrl = "https://api.telegram.org/bot" . $token . "/";
    }

    public function getUpdates(int $offset = 0, int $limit = 1) {
        $params = [
            'offset' => $offset,
            'limit' => $limit,
        ];

        $url = $this->urlBuilder("getUpdates", $params);

        $output = (new CurlHelper($url))->sendGetRequest();
        if ($output) {
            return json_decode($output, JSON_OBJECT_AS_ARRAY);
        } else {
            return false;
        }
    }
    
    public function sendPhoto(Photo $photo) {
        $params = [
            'chat_id' => $photo->getSendTo(),
            'photo' => $photo->getPhoto()
        ];

        foreach($photo->getOptions() as $key => $value) {
            switch(gettype($value)) {
                case "array":
                    $params[$key] = json_encode($value);
                    break;

                    default:
                    $params[$key] = $value;
                    break;
            }
        }

        $url = $this->urlBuilder("sendPhoto");

        $output = (new CurlHelper($url))->sendPostRequest($params);

        if ($output) {

            return json_decode($output, JSON_OBJECT_AS_ARRAY);

        } else {
            return false;
        }
    }

    public function sendMessage(Message $message) {
        $params = [
            'chat_id' => $message->getSendTo(),
            'text' => $message->getText()
        ];
        
        foreach ($message->getOptions() as $key => $value) {
            switch(gettype($value)) {
                case "array":
                    $params[$key] = json_encode($value);
                    break;

                    default:
                    $params[$key] = $value;
                    break;
            }
        }

        $url = $this->urlBuilder('sendMessage');
        
        $output = (new CurlHelper($url))->sendPostRequest($params);
        if ($output) {
            return json_decode($output, JSON_OBJECT_AS_ARRAY);
        } else {
            return false;
        }
    }
    
    private function urlBuilder(string $method, array $parameters = []) {
        $url = $this->baseUrl . $method;

        if (count($parameters) > 0) {
            $url .= "?";

            $index = 0;

            foreach($parameters as $key => $value) {
                $url .= $key;
                $url .= "=";
                
                
                if (str_contains($value, ' ')) {
                    $url .= str_replace(' ', '+', $value);
                } else {
                    $url .= $value;
                }

                if ($index !== count($parameters) - 1) {
                    $url .= "&";
                }

                $index++;
            }
        }

        return $url;
    }
}

?>