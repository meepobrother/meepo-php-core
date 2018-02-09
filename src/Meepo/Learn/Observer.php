<?php
abstract class Observer
{
    private $observers = array();
    public function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}
interface Observer
{
    //这里就是在事件发生后要执行的逻辑
    public function update();
}
