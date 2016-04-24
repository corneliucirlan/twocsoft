<?php

	/**
	* CERTIFICATIONS CLASS
	*/
	class CERT
	{
		private $certName;
		private $certOrganisation;
		private $certYear;
		
		function __construct($certName, $certOrganisation, $certYear)
		{
			$this->certName = $certName;
			$this->certOrganisation = $certOrganisation;
			$this->certYear = $certYear;
		}

		function getCertName()
		{
			return $this->certName;
		}

		function getCertOrganisation()
		{
			return $this->certOrganisation;
		}

		function getCertYear()
		{
			return $this->certYear;
		}
	}

?>