<?php
	require "classes/Page.php";
	
	class Index extends Page
	{
		protected function GetContent()
		{
			$output = '<span>pmrvic@789.com 1234</span><br>';
			
			$output .= '<h1>Dobrodošli u AlgebraBox</h1>';
			$output .= '<p>Pohranite svoje datoteke kod nas.</p>';
			
			return $output;
		}
		
		protected function PageRequiresAuthenticUser()
		{
			return false; // jedino na ovu stanicu ne moram biti registriran
		}
	}

	$site = new Index();
	$site->Display('AlgebraBox Index');