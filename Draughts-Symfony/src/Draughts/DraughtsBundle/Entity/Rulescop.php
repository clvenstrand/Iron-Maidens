<?php
// src/Draughts/DraughtsBundle/Entity/Draught.php

namespace Draughts\DraughtsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;



class Rules {
	
	public $lol;
	public $id;
	public $id1;
	public $newId1;
	public $newId2;
	public $target;
	public $pt;
	
	public function ajaxTest (){
	if (isset($_GET['target'])) {
		$this->id = $_GET['target'];
		$this->pt = $_GET['token'];
		
	
	$this->checkColor($this->id, $this->pt);
	}
		else{echo "inget funkar";}	
	}
	
	
	
	public function checkColor ($id, $pt) {
		$this->id = $id;
		
		
		
		//$results = array("key" => "value");
//echo $_GET['callback'] . '(' . json_encode($results) . ')';


			if ($pt == "playerToken1") {
			
			$this->getMovesWhite($id);
		} else if ($pt == "playerToken2") {
			$this->getMovesBlack($id);
		}
	}
	
	public function getMovesWhite ($id) {
		global $id1;
		global $newId1;
		$this->newId1 = $id;
		global $newId2;
		$this->newId2 = $id;
	
		$this->id1 = intval($id);
		if (($id1 -7 >= 1) || ($id -9 >= 1)) {
			$this->newId1 -= 7;
			$this->newId2 -= 9;
			$this->checkWhiteSides($id, $newId1, $newId2);
		} else {
			// GODMODE
		}
	}

	public function getMovesBlack ($id) {
		global $id1;
		global $newId1;
		$this->newId1 = $id;
		global $newId2;
		$this->newId2 = $id;
		
		$id1 = intval($id);
		if (($id1 +7 <= 64) || ($id1 +9 <= 64)) {
			$this->newId1 += 7;
			$this->newId2 += 9;
			$this->checkBlackSides($id, $newId1, $newId2);
		} else {
			// GODMODE
		}
	}
	
	public function checkWhiteSides ($id, $newId1, $newId2) {
		
		if (($id == 49) || ($id == 41) || ($id == 33) || ($id == 25) || ($id == 17) || ($id == 9)) {
			$this->newId2 = NULL;
			// Klar i php
		} else if (($id == 56) || ($id == 48) || ($id == 40) || ($id == 32) || ($id == 24) || ($id == 16)) {
			$this->newId1 = NULL;
			// Klar i php
		} else {
			$this->lol = $this->newId1 . " " . $this->newId2;
			
			
		}
	}
	
	public function checkBlackSides ($id, $newId1, $newId2) {
		
		if (($id == 49) || ($id == 41) || ($id == 33) || ($id == 25) || ($id == 17) || ($id == 9)) {
			$this->newId1 = NULL;
			// Klar i php
		} else if (($id == 56) || ($id == 48) || ($id == 40) || ($id == 32) || ($id == 24) || ($id == 16)) {
			$this->newId2 = NULL;
			// Klar i php
		} else {
			// Klar i php
			$this->lol = $this->newId1 . " " . $this->newId2;
		}				
	}


}