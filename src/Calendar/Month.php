<?php

namespace App\Date;

class Month  
{

	public $days = ['Lundi'
				, 'Mardi'
				, 'Mercredi'
				, 'Jeudi'
				, 'Vendredi'
				, 'Samedi'
				, 'Dimanche'];

	private $months = ['Janvier','Février','Mars','Avril','','Mai', 'Juin', 'Juillet', 'Aout', 'Sptembre' , 'Octobre', 'Novembre', 'Décembre'];
	
	private $month;
	private $year;


	/**
	* @param int $month
	* @param int $year
	* @throws Exception
	*/
	function __construct(?int $month = null, ?int $year =null)
	{
		if ($month === null && $month < 0 || $month > 12) 
		{
			$month = intval(date('m'));
		}
		if ($year === null) 
		{
			$year = intval(date('Y'));
		}
		/*if ($month < 0 || $month > 12) 
		{
			throw new \Exception("Le mois n'est pas valide");
		}
		$month = $month % 12;*/

		/*if ($year < 1970) 
		{
			throw new \Exception("Année inférieur à 1970");
		}*/

		$this->month =$month;
		$this->year =$year;

	}

	// Retourne le premier jour du mois
	public function getStratingDay () : \Datetime 
	{
		$start = new \Datetime("{$this->year}-{$this->month}-01"); 
	}


	public function toString() :string
	{
		return $this->months[$this->month - 1] . '' . $this->year; 
	}

	// Retourne le nombre de semaine dans le mois
	public function getWeeks () :int 
	{
		$start = $this->getStratingDay();
		$end = (clone $start)->modify('+1 month -1 day')
		var_dump($start, $end);

		$weeks = intval($end->format('W')) - intval($start->format('W')) +1; 
		if ($weeks < 0) 
		{
			$weeks = intval($start->format('W'));
		}	
		return $weeks;
	}

	public function withinMont (\Datetime $date): bool 
	{
		return $this->getStratingDay()->format('Y-m') === $date->format('Y-m');
	}

	public function nextMonth (): Month
	{
		$month = $this->month + 1;
		$year = $this->year;
		if($month >12) {
			$month = 1;
			$year += 1;
		}
		return new Month($month, $year);
	}

	public function previousMonth (): Month
	{
		$month = $this->month - 1;
		$year = $this->year;
		if($month < 1) {
			$month = 12;
			$year -= 1;
		}
		return new Month($month, $year);
	}
}