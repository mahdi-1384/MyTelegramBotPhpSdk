<?php

class StringUtils {
    private string $str;

    public function __construct(string $str)
    {
        $this->str = $str;
    }

    public function getEscaped() {
        $this->str = str_replace(".", "\.", $this->str);


        return $this->str;
    }
}