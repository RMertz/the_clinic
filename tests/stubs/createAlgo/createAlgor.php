<?php
class createAlgor
{
	public function __construct()
	{

	}

	public function test(int $i)
	{
		$error="";
		if($i == 1){
        		$error = 'create 1 set of directions';
    		}else if($i == 2){
        		$error = 'create 2 sets of directions';
    		}else if($i == 3){
        		$error = 'create 3 sets of directions';
		}
		else{
			$error = 'not a valid number of directions';
		}
		return $error;
	}
}
