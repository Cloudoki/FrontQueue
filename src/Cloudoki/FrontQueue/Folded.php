<?php namespace Cloudoki\FrontQueue;

use Cloudoki\FrontQueue\Controllers\DispatchController;
use Illuminate\Support\Facades\Config;

class Folded {
	
	/**
	 *	Execute php job
	 *	The job is handled in sync mode
	 */

	public function dispatch ($jobload)
	{
		$Controller = new DispatchController ();
		
		return $Controller->dispatch ($jobload);
	}
	
	public function doHigh ($job, $jobload) { return $this->dispatch ($jobload); }
	
	public function doLow ($job, $jobload) { return $this->dispatch ($jobload); }
	
	public function doHighBackground ($job, $jobload) { return $this->dispatch ($jobload); return 'sync high'; }
	
	public function doLowBackground ($job, $jobload){ return $this->dispatch ($jobload); return 'sync low'; }
}