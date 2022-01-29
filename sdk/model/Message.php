<?php

/**
 * This is the message you want to send.
 * You send message by passing one intance of this to sendMessage function of MyBot class
*/

require __DIR__ . "/BaseData.php";

class Message extends BaseData {
    private string $text;

    public function __construct(int $sendTo = null, string $text = null, array $options = []) {
        if ($sendTo !== null) {
            $this->sendTo = $sendTo;
        }

        if ($text !== null) {
            $this->text = $text;
        }

        $this->options = $options;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    /**
     * @return int
     */
    public function getSendTo(): int
    {
        return $this->sendTo;
    }

    /**
     * @param int $sendTo
     */
    public function setSendTo(int $sendTo): void
    {
        $this->sendTo = $sendTo;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }
}

?>