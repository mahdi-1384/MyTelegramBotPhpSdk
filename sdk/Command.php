<?php

abstract class Command {
    abstract function execute(MyBot $myBot, array $resultObj);

    abstract static function getName(): string;
}

?>