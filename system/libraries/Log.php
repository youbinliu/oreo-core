<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Logging Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Logging
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/errors.html
 */
class CI_Log {

	protected $_log_path;
	protected $_threshold	= 1;
	protected $_date_fmt	= 'Y-m-d H:i:s';
	protected $_enabled	= TRUE;
	protected $_levels	= array('ALL'=>0,'DEBUG' => 1, 'INFO' => 2,  'TRACE' => 3,'WARNING'=>4,'ERROR'=>5);

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$config =& get_config();

		$this->_log_path = ($config['log_path'] != '') ? $config['log_path'] : APPPATH.'logs/';

		if ( ! is_dir($this->_log_path) OR ! is_really_writable($this->_log_path))
		{
			$this->_enabled = FALSE;
		}

		if (is_numeric($config['log_threshold']))
		{
			$this->_threshold = $config['log_threshold'];
		}

		if ($config['log_date_format'] != '')
		{
			$this->_date_fmt = $config['log_date_format'];
		}
	}

	// --------------------------------------------------------------------
	public function debug($msg,$errno = 0,$depth = 0){
		return $this->write_log("debug",$msg,false,$errno,$depth+1);
	}
	
	public function info($msg,$errno = 0,$depth = 0){
		return $this->write_log("info",$msg,false,$errno,$depth+1);
	}
	
	public function trace($msg,$errno = 0,$depth = 0){
		return $this->write_log("trace",$msg,false,$errno,$depth+1);
	}
	
	public function warning($msg,$errno = 0,$depth = 0){
		return $this->write_log("warning",$msg,false,$errno,$depth+1);
	}
	
	public function error($msg,$errno = 0,$depth = 0){
		return $this->write_log("error",$msg,false,$errno,$depth+1);
	}
	/**
	 * Write Log File
	 *
	 * Generally this function will be called using the global log_message() function
	 *
	 * @param	string	the error level
	 * @param	string	the error message
	 * @param	bool	whether the error is a native PHP error
	 * @return	bool
	 */
	public function write_log($level = 'error', $msg, $php_error = FALSE,$errno = 0,$depth = 0)
	{
		if ($this->_enabled === FALSE)
		{
			return FALSE;
		}

		$level = strtoupper($level);

		if ( ! isset($this->_levels[$level]) OR ($this->_levels[$level] < $this->_threshold))
		{
			return FALSE;
		}
		
		$filepath = $this->_log_path.'log-'.date('Y-m-d').'.log';
		if( ($this->_levels[$level] == $this->_levels["ERROR"]) || ($this->_levels[$level] == $this->_levels["WARNING"]) )
		{
			$filepath .= '.wf';
		}
		
		$message  = '';

		if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
		{
			return FALSE;
		}
		
		$trace = debug_backtrace();
		if( $depth >= count($trace) )
		{
			$depth = count($trace) - 1;
		}
		
		$file = isset($trace[$depth]['file'])?basename($trace[$depth]['file']):'';
		$line = isset($trace[$depth]['line'])?$trace[$depth]['line']:'';
		
		$message = sprintf("[$level] [".date($this->_date_fmt)."] [$file:$line] logid=[%s] ip=[%s]"
				."uri=[%s] errno=[$errno] errmsg=[%s]\n",
				get_logid(),get_client_ip(),isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '',$msg);
		
		flock($fp, LOCK_EX);
		fwrite($fp, $message);
		flock($fp, LOCK_UN);
		fclose($fp);

		@chmod($filepath, FILE_WRITE_MODE);
		return TRUE;
	}

}
// END Log Class

/* End of file Log.php */
/* Location: ./system/libraries/Log.php */