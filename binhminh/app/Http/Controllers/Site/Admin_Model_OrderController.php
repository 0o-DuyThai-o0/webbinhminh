<?php namespace App\Http\Controllers\Site;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use View;
use Session;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
	
	class Admin_Model_Order extends Admin_Model_System
	{
		public $invoiceId;
		
		public function create()
		{
			////////////////////
			//	PROCESS TO ADD ORDER
			//	AND GENERATE INVOICE ID TO TRACKING
			$this->invoiceId = rand(1000000, 9999999);
			
			return true;
		}
	}