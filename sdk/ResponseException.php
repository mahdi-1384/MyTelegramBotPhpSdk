<?php

class ResponseException {
    private $error_code, $description;

    public function __construct(array $array) {
        $this->error_code = $array['error_code'];
        $this->description = $array['description'];
    }

    public function getErrorCode() {
        return $this->error_code;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function __toString(): string {
        return "ErrorCode: " . $this->error_code . "\n" .
        "Description: " . $this->description;
    }
}


?>