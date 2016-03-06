<?php namespace Cloudoki\FrontQueue;

use Illuminate\Support\Facades\Config;

class FrontLocalQueue extends FrontQueue
{

	/**
	 *	Get Server Client
	 *	In this case, a synchronous handler
	 *
	 *	@return object
	 */
	public static function getServerClient()
	{
		return config ('app.stacked', true)? 
			
			new Sync:
			new Folded;
	}
	
	/**
	 *	Foreground job
	 *	A low (default) or high priority foreground job.
	 *	Waits for process and returns response.
	 *
	 *	@return object
	 */
	public static function request($job, $jobload, $priority = false)
	{
		$client = self::getServerClient();
		
		return $priority?
		
			$client->doHigh ($job, $jobload):
			$client->doLow ($job, $jobload);
	}
	
	/**
	 *	Background job
	 *	A low (default) or high priority background job.
	 *	Only returns the job handle. Doesn't wait for actual process.
	 *
	 *	@return string
	 */
	public static function queue($job, $jobload, $priority = false)
	{
		$client = self::getServerClient();

		return $priority?
		
			$client->doHighBackground ($job, $jobload):
			$client->doLowBackground ($job, $jobload);
	}

}
