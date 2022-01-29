<?php


class BaseData {
    protected int $sendTo;
    protected array $options = [];

    public function getSendTo() {
        return $this->sendTo;
    }

    public function setSendTo(int $sendTo) {
        $this->sendTo = $sendTo;
    }

    public function getOptions() {
        return $this->options;
    }

    public function setOptions(array $options) {
        $this->options = $options;
    }
}

?>