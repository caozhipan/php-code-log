<?php
/**
*Simple log class
*/
class Log{
	private $_logPath = "";
	private $_logFile = "";
	private $_level = "debug";//error, warning,notice,define
	private $_sourceFile = "";
	private $_debugHandle = NULL;
	private $_errorHandle = NULL;
	private $_warningHandle = NULL;
	private $_noticeHandle = NULL;
	private $_defineHandle = NULL;

	public function __construct($logPath, $sourceFile){
		if(empty($logPath)){
			$logPath = "./";
		}
		$this->_logPath = $logPath;
		$this->_sourceFile = $sourceFile;
	}

	/**
	*Debug
	*/
	public function debug($msg, $key = "debug"){
		$date = date("Ymd");
		$time = date("Y-m-d H:i:s");
		$str = $time . "\t\t" . $this->_sourceFile . "\t\t" . $key . "\t\t" . $msg . "\n";
		if(!empty($this->_debugHandle)){
			fwrite($this->_debugHandle, $str);
		}
		else{
			if(!file_exists($this->_logPath . $date . "_log_" . "debug.txt")){
				$this->_debugHandle = fopen($this->_logPath . $date . "_log_" . "debug.txt", "a+");
				fwrite($this->_debugHandle, "time\t\tsourceFile\t\tkey\t\tmsg\n");
			}
			else{
				$this->_debugHandle = fopen($this->_logPath . $date . "_log_" . "debug.txt", "a+");
			}
			fwrite($this->_debugHandle, $str);
		}

		
	}

	/**
	*Error
	*/
	public function error($msg, $key = "error"){
		$date = date("Ymd");
		$time = date("Y-m-d H:i:s");
		$str = $time . "\t\t" . $this->_sourceFile . "\t\t" . $key . "\t\t" . $msg . "\n";
		if(!empty($this->_errorHandle)){
			fwrite($this->_errorHandle, $str);
		}
		else{
			if(!file_exists($this->_logPath . $date . "_log_" . "error.txt")){
				$this->_errorHandle = fopen($this->_logPath . $date . "_log_" . "error.txt", "a+");
				fwrite($this->_errorHandle, "time\t\tsourceFile\t\tkey\t\tmsg\n");
			}
			else{
				$this->_errorHandle = fopen($this->_logPath . $date . "_log_" . "error.txt", "a+");
			}
			fwrite($this->_errorHandle, $str);
		}
	}

	/**
	*Warning
	*/
	public function warning($msg, $key = "warning"){
		$date = date("Ymd");
		$time = date("Y-m-d H:i:s");
		$str = $time . "\t\t" . $this->_sourceFile . "\t\t" . $key . "\t\t" . $msg . "\n";
		if(!empty($this->_warningHandle)){
			fwrite($this->_warningHandle, $str);
		}
		else{
			if(!file_exists($this->_logPath . $date . "_log_" . "warning.txt")){
				$this->_warningHandle = fopen($this->_logPath . $date . "_log_" . "warning.txt", "a+");
				fwrite($this->_warningHandle, "time\t\tsourceFile\t\tkey\t\tmsg\n");
			}
			else{
				$this->_warningHandle = fopen($this->_logPath . $date . "_log_" . "warning.txt", "a+");
			}
			fwrite($this->_warningHandle, $str);
		}
	}

	/**
	*Notice
	*/
	public function notice($msg, $key = "notice"){
		$date = date("Ymd");
		$time = date("Y-m-d H:i:s");
		$str = $time . "\t\t" . $this->_sourceFile . "\t\t" . $key . "\t\t" . $msg . "\n";
		if(!empty($this->_noticeHandle)){
			fwrite($this->_noticeHandle, $str);
		}
		else{
			if(!file_exists($this->_logPath . $date . "_log_" . "notice.txt")){
				$this->_noticeHandle = fopen($this->_logPath . $date . "_log_" . "notice.txt", "a+");
				fwrite($this->_noticeHandle, "time\t\tsourceFile\t\tkey\t\tmsg\n");
			}
			else{
				$this->_noticeHandle = fopen($this->_logPath . $date . "_log_" . "notice.txt", "a+");
			}
			fwrite($this->_noticeHandle, $str);
		}
	}

	/**
	*define
	*/
	public function define(array $msg, $key = "define"){
		$date = date("Ymd");
		$time = date("Y-m-d H:i:s");
		$keyStr = "";
		$valueStr = "";
		if(!empty($msg)){
			$keyStr = implode("\t\t", array_keys($msg));
			$valueStr = implode("\t\t", array_values($msg));
		}

		$str = $time . "\t\t" . $this->_sourceFile . "\t\t" . $key . "\t\t" . $valueStr . "\n";

		if(!empty($this->_defineHandle)){
			fwrite($this->_defineHandle, $str);
		}
		else{
			if(!file_exists($this->_logPath . $date . "_log_" . "define.txt")){
				$this->_defineHandle = fopen($this->_logPath . $date . "_log_" . "define.txt", "a+");
				fwrite($this->_defineHandle, "time\t\tsourceFile\t\tkey\t\t" . $keyStr . "\n");
			}
			else{
				$this->_defineHandle = fopen($this->_logPath . $date . "_log_" . "define.txt", "a+");
			}
			
			fwrite($this->_defineHandle, $str);
		}
	}

	public function __destruct(){
		if(!empty($this->_debugHandle)){
			fclose($this->_debugHandle);
		}
		if(!empty($this->_errorHandle)){
			fclose($this->_errorHandle);
		}
		if(!empty($this->_warningHandle)){
			fclose($this->_warningHandle);
		}
		if(!empty($this->_noticeHandle)){
			fclose($this->_noticeHandle);
		}
		if(!empty($this->_defineHandle)){
			fclose($this->_defineHandle);
		}
	}
}