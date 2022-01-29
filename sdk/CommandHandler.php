<?php

class CommandHandler {
    private MyBot $myBot;

    public function __construct(MyBot $myBot) {
        $this->myBot = $myBot;
    }

    public function execute(Command $commandInstance, array $resultObj) {
        return $commandInstance->execute($this->myBot, $resultObj);
    }
}

?>