<?php
//	ログ出力クラス 20150414
define('THRESHOLD', 4);		// 1 にすればデバッグ抑止
define('DATEFMT', 'H:i:s');		// 1 にすればデバッグ抑止

function debug($message) {
	static $log = NULL;
	static $first = TRUE;

	if (!$log) $log = new Log();
	if ($first) {
//		$log->write_log('debug', '----------------------------------------');
		$first = FALSE;
	}
	$log->write_log('debug', $message);
}

function backtrace() {
	static $log = NULL;

	if (!$log) $log = new Log();
	ob_start();
	debug_print_backtrace();
	$out = ob_get_contents();
	ob_end_clean();
	$log->write($out);
}

function caller() {
	static $log = NULL;

	if (!$log) $log = new Log();
	ob_start();
	debug_print_backtrace();
	$out = ob_get_contents();
	ob_end_clean();
	$lines = explode("\n", $out);
	debug($lines[1]);
}

function dump($var) {
	static $log = NULL;
	
	if (!$log) $log = new Log();
	ob_start();
	print_r($var);
	$out = ob_get_contents();
	ob_end_clean();
	$log->write($out);
}

function display_logs() {
	static $log = NULL;

	if (!$log) $log = new Log();
	$filepath = $log->get_filepath();
	header("Content-type:text/html;charset=UTF-8");
	if (file_exists($filepath)) {
		@highlight_file($filepath);
	} else {
		echo 'No Logs';
	}
}

class Log {
	protected $log_path;
	protected $filepath;
	protected $threshold = THRESHOLD;	// 1にすればデバッグ出力抑止できる
	protected $enabled = TRUE;
	protected $levels = array('ERROR'=>1, 'DEBUG'=>2, 'INFO'=>3, 'ALL'=>4);

	// Constructor
	public function __construct() {
		$this->log_path = dirname(__FILE__).'/logs';
		if (!is_dir($this->log_path)) {
			$this->enabled == FALSE;
		}
		//$this->filepath = $this->log_path.'/log-'.date('Y-m-d').'.php';
		$this->filepath = $this->log_path.'/log-'.date('Y-m-d').'.txt';
	}

	public function write_log($level, $msg) {
		if ($this->enabled === FALSE) return FALSE;
		$level = strtoupper($level);

		if (!isset($this->levels[$level]) OR ($this->levels[$level] > $this->threshold)) {
			return FALSE;
		}

		$message = '';
		if (!file_exists($this->filepath)) {
			$message .= "<"."?php\n\n";
		}
		if (!$fp = @fopen($this->filepath, 'ab')) {
			// OPEN ERROR
			return FALSE;
		}
		$message .= $level.' '.(($level == 'INFO')?' -':'-').' '.date(DATEFMT).' --> '.$msg."\n";
		flock($fp, LOCK_EX);
		fwrite($fp, $message);
		flock($fp, LOCK_UN);
		fclose($fp);

		@chmod($filepath, FILE_WRITE_MODE);
		
		return TRUE;
	}

	public function write($msg) {
		if ($this->enabled === FALSE) return FALSE;
		if (!$fp = @fopen($this->filepath, 'ab')) return FALSE;
		flock($fp, LOCK_EX);
		fwrite($fp, $msg);
		flock($fp, LOCK_UN);
		fclose($fp);
	}

	public function get_filepath() {
		return $this->filepath;
	}
}
