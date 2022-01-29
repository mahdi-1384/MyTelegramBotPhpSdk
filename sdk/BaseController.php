<?php

/**
 * Use have to create one controller for each state of your bot.
 * Controller classes should extend the BaseController class.
 * This class has getResponse function which returns a Message object which can be passed to sendMessage function of MyBot class
 * to send a message. You can return null in case of not requiring a Message instance.
 * This class receives one update object which is the coming update
 */

abstract class BaseController {

    abstract function execute();
}

?>