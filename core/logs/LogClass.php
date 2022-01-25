<?php
namespace Core\logs;


use SplSubject;

class LogClass implements \SplObserver
{
    private $file = "core/logs/storage/log.txt";

    public function update(SplSubject $subject)
    {
        $this->loggedEvent($subject->getLogMessage());
    }

    private function loggedEvent($message)
    {
        file_put_contents($this->file, $message, FILE_APPEND);
    }
}