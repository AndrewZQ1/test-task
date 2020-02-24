<?php  

namespace application\lib;


class Color 
{
	
	function __construct($status)
	{
		$this->status = $status;
	}


	public function setColor() {
		switch($this->status){
		        case 'Новый':  $color = 'bg-success'; break;
		        case 'Диагностика': $color = 'bg-warning'; break;
		        case 'В работе': $color = 'bg-warning'; break;
		        case 'Закрыт': $color = 'bg-dark'; break;
		        case 'Без ремонта': $color = 'bg-dark'; break;
		        default: $color = 'bg-success'; break;
		}	
		return $color;
	}

}

