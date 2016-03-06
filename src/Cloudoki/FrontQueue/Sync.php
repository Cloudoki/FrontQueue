<?php namespace Cloudoki\FrontQueue;

use Illuminate\Support\Facades\Config;

class Sync {
	
	/**
	 *	Execute php job
	 *	The job is handled in sync mode
	 */

	public function doExec ($job, $jobload)
	{
		exec ("php -f '" . env('WORKER_PATH', '/var/www/worker') . "/" . $job . ".php' sync '" . json_encode ($jobload) . "'", $output);
		
		return implode ("\n", $output);
	}
	
	public function doHigh ($job, $jobload) { return $this->doExec ($job, $jobload); }
	
	public function doLow ($job, $jobload) { return $this->doExec ($job, $jobload); }
	
	public function doHighBackground ($job, $jobload) { $this->doExec ($job, $jobload); return 'sync high'; }
	
	public function doLowBackground ($job, $jobload){ $this->doExec ($job, $jobload); return 'sync low'; }
}