<?php
namespace SkypeBot\Command;

use SkypeBot\Entity\Activity;

class SendMessage extends SendActivity  {

    /**
     * Message constructor.
     * @param $message
     * @param $conversation
     */
    public function __construct($message, $conversation) {
       $this->activity = new Activity();
        $this->activity->setText($message);
        $from = new \SkypeBot\Entity\Address();
        //get 'from' from conversation
        //slack needs this from field in the reply
        $fromArr = explode(":",$conversation);
        $from->setId($fromArr[0].":".$fromArr[1]);
        $this->activity->setFrom($from);        
        $this->conversation = $conversation;
    }
}
