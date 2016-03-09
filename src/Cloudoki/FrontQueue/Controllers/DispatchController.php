<?php

namespace Cloudoki\FrontQueue\Controllers;

use Illuminate\Routing\Controller as BaseController;

class DispatchController extends BaseController 
{
	/**
	 *	Dispatch job
	 *	This is the general dispatch action
	 */
	public function dispatch ($args)
	{
		try
		{
			# Identify class
			$controller = (class_exists ($args->controller)? null: "App\\Http\\Controllers\\") . $args->controller;
			
			# Controller IoC
			$response = app()
				->make ($controller)
				->{$args->action} ($args->payload);
		}
		catch (Exception $e)
		{
			# construct error response
			$response = (object)
			[
				'error'=> $e->__toString (),
				'message'=> $e->getMessage (),
				'code'=> $e->getCode ()?: 403
			];
		}
		
		return $response;
	}
}