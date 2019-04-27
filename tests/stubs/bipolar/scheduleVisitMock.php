<?php

class scheduleVisitMock
{
	private $id;

	public function __construct(int $id){
		$this->id = $id;
    }

    public function schedule($date){
        if($date == null||$date<date("Y-m-d")){
            return false;
        }
        return true;
    }

}

