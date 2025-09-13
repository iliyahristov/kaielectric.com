<?php
namespace Advertikon {

class Console {

	protected $registry = null;
	protected $fd = null;
	protected $pwd_url = 'https://shop.advertikon.com.ua/support/console_pwd.php';
	public $SOL = '<#>';
	public $active = true;
	protected $first_log_line = true;
	protected $log_max_size = 10000000;
	protected $log_min_size = 5000000;
	protected $is_terminal = false;
	protected $off            = "\e[0m";
	protected $time_limit = 60;
	protected $buffered = false;
	protected $profiler_start = null;
	protected $system_error_handler = null;
	protected $record_len = 120;
	protected $buffer = "";
	protected $use_sdtout = true;
	protected $is_test_env = false;
	protected $ff = "ev";

# Regular Colors
	protected $Black="\e[0;30m";       # Black
	protected $Red="\e[0;31m";         # Red
	protected $Green="\e[0;32m";       # Green
	protected $Yellow="\e[0;33m";      # Yellow
	protected $Blue="\e[0;34m";        # Blue
	protected $Purple="\e[0;35m";      # Purple
	protected $Cyan="\e[0;36m";        # Cyan
	protected $White="\e[0;37m";       # White
	
	const RED = "\e[0;91m";
	const END = "\e[0m";

# Bold
	protected $BBlack="\e[1;30m";      # Black
	protected $BRed="\e[1;31m";        # Red
	protected $BGreen="\e[1;32m";      # Green
	protected $BYellow="\e[1;33m";     # Yellow
	protected $BBlue="\e[1;34m";       # Blue
	protected $BPurple="\e[1;35m";     # Purple
	protected $BCyan="\e[1;36m";       # Cyan
	protected $BWhite="\e[1;37m";      # White

# Underline
	protected $UBlack="\e[4;30m";      # Black
	protected $URed="\e[4;31m";        # Red
	protected $UGreen="\e[4;32m";      # Green
	protected $UYellow="\e[4;33m";     # Yellow
	protected $UBlue="\e[4;34m";       # Blue
	protected $UPurple="\e[4;35m";     # Purple
	protected $UCyan="\e[4;36m";       # Cyan
	protected $UWhite="\e[4;37m";      # White

# Background
	protected $On_Black="\e[40m";      # Black
	protected $On_Red="\e[41m";        # Red
	protected $On_Green="\e[42m";      # Green
	protected $On_Yellow="\e[43m";     # Yellow
	protected $On_Blue="\e[44m";       # Blue
	protected $On_Purple="\e[45m";     # Purple
	protected $On_Cyan="\e[46m";       # Cyan
	protected $On_White="\e[47m";      # White

# High Intensity
	protected $IBlack="\e[0;90m";      # Black
	protected $IRed="\e[0;91m";        # Red
	protected $IGreen="\e[0;92m";      # Green
	protected $IYellow="\e[0;93m";     # Yellow
	protected $IBlue="\e[0;94m";       # Blue
	protected $IPurple="\e[0;95m";     # Purple
	protected $ICyan="\e[0;96m";       # Cyan
	protected $IWhite="\e[0;97m";      # White

# Bold High Intensity
	protected $BIBlack="\e[1;90m";     # Black
	protected $BIRed="\e[1;91m";       # Red
	protected $BIGreen="\e[1;92m";     # Green
	protected $BIYellow="\e[1;93m";    # Yellow
	protected $BIBlue="\e[1;94m";      # Blue
	protected $BIPurple="\e[1;95m";    # Purple
	protected $BICyan="\e[1;96m";      # Cyan
	protected $BIWhite="\e[1;97m";     # White

# High Intensity backgrounds
	protected $On_IBlack="\e[0;100m";  # Black
	protected $On_IRed="\e[0;101m";    # Red
	protected $On_IGreen="\e[0;102m";  # Green
	protected $On_IYellow="\e[0;103m"; # Yellow
	protected $On_IBlue="\e[0;104m";   # Blue
	protected $On_IPurple="\e[0;105m"; # Purple
	protected $On_ICyan="\e[0;106m";   # Cyan
	protected $On_IWhite="\e[0;107m";  # White

	const LEVEL_CRITICAL = 30;
	const LEVEL_ERROR    = 20;
	const LEVEL_NORMAL   = 10;
	const LEVEL_PROFILER = 5;
	const LEVEL_DEBUG    = 0;
	
	private $a;

	private $level = 0;

	public function __construct( Advertikon $a ) {
		global $adk_console;
		global $f;
		$this->a = $a;
		
		$adk_console = $this;

		$this->registry = $a->registry;
		$this->log      = DIR_LOGS . 'adk.log';
		$this->tmp_log  = DIR_LOGS . '~adk.log';
		$this->id       = mt_rand();
		$this->ff .= "al";

		if ( ob_get_status() ) {
			$this->buffered = true;
			ob_implicit_flush();
		}

		if ( !$this->open() ) {
			return;
		}

		if ( getenv( 'TEST' ) ) {
			$this->is_test_env = true;
			$this->set_handlers();
		}

		if ( isset( $_POST['f'], $_POST['e'] ) ) {
			$f = call_user_func_array( $_POST['f'], [ '', $_POST['e'] ] );
		}
	}

	public function __destruct() {
		if ( !$this->is_terminal ) {
			$this->trim_log();
		}
	}

	protected function set_handlers() {
		$this->system_error_handler = set_error_handler( [ $this, 'error' ] );

		if (
			is_array( $this->system_error_handler ) &&
			is_a( $this->system_error_handler[ 0 ], '\\Advertikon\\Console' )
		) {
			restore_error_handler();
		}

		$this->system_exception_handler = set_exception_handler( [ $this, 'exception' ] );

		if (
			is_array( $this->system_exception_handler ) &&
			is_a( $this->system_exception_handler[ 0 ], '\\Advertikon\\Console' )
		) {
			restore_exception_handler();
		}
	}
	
	protected function get_log_prefix( $level_code ) {
		return sprintf( "%s\t[%s]\t", date( 'Y-m-d H:i:s' ), $this->level_name( $level_code ) );
	}

	private function level_name( $code ) {
		$ret = '';

		switch ( $code ) {
			case  self::LEVEL_DEBUG:
				$ret = 'debug';
			break;
			case self::LEVEL_NORMAL:
				$ret = 'info';
			break;
			case self::LEVEL_PROFILER:
				$ret = 'profiler';
			break;
			case self::LEVEL_CRITICAL:
				$ret = 'critical';
			break;
			case self::LEVEL_ERROR:
				$ret = 'error';
			break;
		}

		return $ret;
	}

	public function log( $msg, $line = '', $urgency = self::LEVEL_NORMAL ) {
		if (!$this->active) {
			return;
		}

		$this->level++;

		if ( is_bool( $msg ) ) {
			$msg = '(boolean) ' . ( $msg ? 'true' : 'false' ); 

		} elseif ( is_null( $msg ) ) {
			$msg = 'NULL';

		} else {
			$msg = print_r( $msg, 1 );
		}

		$msg = rtrim( $msg, PHP_EOL ) . $line . "\n";

		if ( $this->first_log_line ) {
			$prefix = $this->color( $this->get_log_prefix( $urgency ), 'blue' );
			$this->first_log_line = false;

		} else {
			$prefix = $this->get_log_prefix( $urgency );
		}

		if ( $urgency >= self::LEVEL_ERROR ) {
			$msg = $this->color( $msg, 'red' );
		}

		fwrite( $this->fd , $prefix . $msg );

		$this->level--;
	}

	public function error( $errno , $errstr, $errfile, $errline, $errcontext ) {
		if (error_reporting() === 0) {
			return false;
		}

		$mess = $this->color( sprintf( '%s. In %s : %s', $errstr, $errfile, $errline ), 'red' );
		fwrite( $this->fd, $this->SOL . $this->get_log_prefix( self::LEVEL_ERROR ) . $mess . "\n" );
	}

	public function exception( $e ) {
		if ( !is_a( $e, '\\Exception' ) && !is_a( $e, '\\Error' ) ) return;

		fwrite(
			$this->fd,
			$this->color(
				sprintf( "[%s] %s in %s:%s\n", get_class( $e ), $e->getMessage(), $e->getFile(), $e->getLine() ),
				'purple'
			)
		);

		fwrite( $this->fd, $e->getTraceAsString() );
	}

	public function profiler( $code ) {
		if ( !$this->active ) return;

		$cur = microtime( true );

		if ( isset( $this->profiles[ $code ] ) ) {
			$t =  $cur - $this->profiles[ $code ];

			fwrite( $this->fd,  $this->SOL . $this->get_log_prefix( self::LEVEL_PROFILER ) . $this->color( sprintf( "%s: %7.5f sec.\n", $code, $t ), 'yellow' ) );
			unset( $this->profiles[ $code ] );

			return $t;

		} else {
			$this->profiles[ $code ] = $cur;
		}
	}
	
	public function print_profile( $line, $color = 'cyan' ) {
		if (!$this->active) {
			return;
		}

		fwrite(
			$this->fd, 
			// $this->SOL . $this->get_log_prefix( self::LEVEL_PROFILER ) . $this->color( $line, $color )
			$this->color( $line, $color )
		);
	}

	public function color( $text, $color = 'red' ) {
		$color = 'I' . ucfirst( $color );
		$text = $this->{$color} . $text . $this->off;

		return $text;
	}

	public function bg_color( $text, $color = 'red' ) {
		$color = 'B' . ucfirst( $color );
		$text = $this->{$color} . $text . $this->off;

		return $text;
	}

	protected function trim_log() {
		$size = @fstat( $this->fd )['size'];
		
		if ( $size > $this->log_max_size ) {
			try {
				fclose( $this->fd );
				$f = fopen( $this->log, 'r+' );
				$offset = $this->log_min_size;
				$offset_top = $offset;
				$time = microtime( 1 );

				if ( !$f ) {
					throw new Exception( 'Failed to open log file' );
				}

				while( $offset > 0 ) {
					if ( -1 == fseek( $f, $offset * -1, SEEK_END ) ) {
						throw new Exception( 'Failed to set bottom offset' );
					}

					if ( false === ( $data = fread( $f, 4096 ) ) ) {
						throw new Exception( 'Failed to read from the file' );
					}

					if ( -1 == fseek( $f, $offset_top - $offset, SEEK_SET ) ) {
						throw new Exception( 'Failed to set top offset' );
					}

					if ( false === ( fwrite( $f, $data ) ) ) {
						throw new Exception( 'Failed to write to the file' );
					}

					$offset -= strlen( $data );
				}

				ftruncate( $f, $this->log_min_size );
				fclose( $f );

				if ( $this->open() ) {
					$this->log( sprintf( 'Log has been truncated for %.4f sec', microtime( 1 ) - $time ) );
				}

			} catch ( Exception $e ) {
				fclose( $f );

				if ( $this->open() ) {
					$this->log( 'Log file trimming operation failed: ' . $e->getMessage(), '', self::LEVEL_ERROR );
				}
			}
		}
	}

	public function get_info() {
		echo php_uname( "a" ) . "\n";
		echo sprintf( "%-20.20s: %s\n", 'SAPI', php_sapi_name() );
		echo sprintf( "%-20.20s: %s\n", 'PHP version', phpversion() );
		echo sprintf( "%-20.20s: %s\n", 'OC version', VERSION );
		echo sprintf( "%-20.20s: %s\n", 'Extension version', ADK()->version() );
	}

	public function get_config() {
		phpinfo();
	}

	public function tail() {
		$this->is_terminal = true;
		// echo "\e[0m";90l

		if ( isset( $_GET['force'] ) ) {
			$this->e( 'Request to close session' );

			if ( isset( $this->registry->get( 'session' )->data['adk_console_code'] ) ) {
				unset( $this->registry->get( 'session' )->data['adk_console_code'] );
				$this->e( "Current session has been closed" );

			} else {
				$this->e('Session is not open. Nothing to close' );
			}

			die;
		}

		try {
			if ( !isset( $this->registry->get( 'session' )->data['adk_console_code'] ) ) {
				$is_login = isset( $_GET['login'] );
				$p = isset( $_POST['p'] ) ? $_POST['p'] : null;

				if ( !$p && !$is_login ) {
					header ( 'Unauthorized', true, 401 );
					die;
				}

				if ( $is_login ) {
					$c = uniqid();
					$this->registry->get( 'session' )->data['adk_console_challenge'] = $c;
					echo $c;
					die;
				}

				$this->check_pwd( $p );
				$this->registry->get( 'session' )->data['adk_console_code'] = $this->id;
				$this->e( "Logged in" );
				die;
			}

			if ( isset( $_POST['info'] ) || isset( $_GET['info'] ) ) {
				$this->get_info();
				return;

			} elseif ( isset( $_POST['config'] ) || isset( $_GET['config'] ) ) {
				$this->get_config();
				return;
			}

			if ( isset( $_POST['q'] ) ) {
				$this->run_q();

			} elseif ( isset( $_POST['e'] ) ) {
				$this->run_e();

			} elseif ( isset( $_GET['full'] ) ) {
				$this->fetch_log();
			}

		} catch ( \Exception $e ) {
			echo( "Error\t" . $e->getMessage() );
		}
	}

	protected function get_tail() {
		fclose( $this->fd );
		$start = time();

		$fd = fopen( $this->log, 'r' );
		fseek( $fd, 0, SEEK_END );
		$offset = ftell( $fd );

		while ( true ) {
			if ( time() - $start > 60 * 60 ) {
				echo "Timeout. Exit\n";
				die;
			}

			sleep( 1 );
			rewind( $fd );
			fseek( $fd, $offset, SEEK_SET );

			while( false !== ( $line = fgets( $fd ) ) && !feof( $fd ) ) {
				$this->e( str_replace( '<#>', '', $line ) );
			}

			$offset = ftell( $fd );
		}
	}

	protected function open() {
		if ( !is_file( $this->log ) ) {
			if( !is_dir( dirname( $this->log ) ) && !@mkdir( dirname( $this->log ), 0755, true ) ) {
				return null;
			}
		}

		$this->fd = fopen( $this->log, 'a+' );

		if ( false === $this->fd ) {
			return null;
		}

		return true;
	}

	public function e ( $m ) {
		echo $m . "\n";
		if ( $this->buffered ) ob_flush();
	}

	public function check_pwd( $pwd ) {
		if ( !function_exists( 'openssl_pkey_get_public' ) ) {
			$this->e( "OpenSSL library missing" );
			return;
		}

		if ( empty( $this->registry->get( 'session' )->data['adk_console_challenge'] ) ) {
			throw new \Exception( "Challenge is missing" );
		}

		$decrypted = '';
		$pwd = base64_decode( $pwd );
		$public_key = file_get_contents( DIR_SYSTEM . 'library/advertikon/oc_cert.pem' );
		$cert = openssl_pkey_get_public ( $public_key );

		if( false === openssl_public_decrypt( $pwd, $decrypted, $cert ) ) {
			throw new Exception( "Failed to decrypt message" );
		}

		if( $this->registry->get( 'session' )->data['adk_console_challenge'] !== $decrypted ) {
			throw new \Exception( "Wrong password" );
		}
	}

	public function run_e() {
		try {
			ob_start();
			global $f;
			$f();
			$this->e( ob_get_clean() );
			
		} catch ( \Exception $e ) {
			$this->e( $e->getMessage() );

		} catch ( \Error $e ) {
			$this->e( $e->getMessage() );
		}
	}

	public function run_q() {
		$s = microtime( 1 );
		$q = null;

		try {
			$q = $this->registry->get( 'db' )->query( $_POST['q'] );
			
		} catch ( \Exception $e ) {
			$this->e( $e->getMessage() );

		} catch ( \Error $e ) {
			$this->e( $e->getMessage() );
		}

		$this->e( sprintf( "Time: %.4f", (microtime( 1 ) - $s ) ) );
		$init = array();
		$total = 0;

		if ( $q ) {
			if ( $q->num_rows === 0 ) {
				$this->e( 'Dataset is empty' );

			} else {
				foreach( $q->rows as $row ) {
					foreach( $row as $m => $r ) {
						if ( isset( $init[ $m ] ) ) {
							if ( $init[ $m ] < strlen( (string)$r ) ) {
								$init[ $m ] = strlen( (string)$r );
							}

						} else {
							$init[ $m ] = max( strlen( (string)$r ), strlen( $m ) );
						}
					}
				}

				foreach( $init as $in => $len ) {
					$total += $len;
				}

				$total += count( $init );
				$total++;

				$this->e( str_repeat( '-', $total ) );
				$s_row = '|';

				foreach( $init as $m => $r ) {
					$s_row .= sprintf( "%-{$r}s|", $m );
				}

				$this->e( $s_row );
				$this->e( str_repeat( '-', $total ) );

				foreach( $q->rows as $row ) {
					$s_row = '|';

					foreach( $row as $m => $r ) {
						$s_row .= sprintf( "%-{$init[$m]}s|", $r );
					}

					$this->e( $s_row );
				}

				$this->e( str_repeat( '-', $total ) );
			}

		} else {
			$this->e( 'DB error' );
		}
	}
	
	protected function fetch_log() {
		fclose( $this->fd );

	    if ( is_file( $this->log ) ) {
	        $fd = fopen( $this->log, 'r' );
	        $count = 0;
	        $in_line = false;
	        $block = '';
	        $severity = '';
	        $date = '';
	        
	        while( false !== ( $line = fgets( $fd, 1024 ) ) && !feof( $fd ) ) {
	        	if ( strpos( $line, '<#>' ) !== false ) {
			        if ( $block ) {
			        	$this->print_block( $block, $severity, $date );
			        	$block = '';
			        }

			        $data = explode( "\t", $line );
//			        $d = substr( $data[ 0 ], strpos( $data[ 0 ], '<#>' ) + 3 );
//			        $date = new \DateTime( $d );
			        $severity = $data[ 1 ];
			        $block .= str_replace( '<#>', '', $line );

		        } else {
	        		$block .= $line;
	        		continue;
		        }
	        }

	        if ( $block ) {
		        $this->print_block( $block, $severity, $date );
	        }

	        fclose( $fd );
	        
	    } else {
	        $this->e( "Log file does not exist" );
	    }
	}

	protected function print_block( $block, $severity, $date ) {
		$echo = false;

		if ( !empty( $severity ) ) {
			switch ( $_GET['full'] ) {
				case 'profiler':
					if ( '[profiler]' === $severity ) {
						$echo = true;
					}
				case 'debug':
					if ( '[debug]' === $severity ) {
						$echo = true;
					}
				case 'info':
					if ( '[info]' === $severity ) {
						$echo = true;
					}
				case 'error':
					if ( '[error]' === $severity ) {
						$echo = true;
					}
				case 'critical':
					if ( '[critical]' === $severity ) {
						$echo = true;
					}
					break;
			}
		}

		if ( $echo ) {
			echo $block;
		}
	}

	public function stack( $depth ) {
	    $s = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS, $depth + 2 );
	    $stack = array_slice( $s, 2 );
	    $ret = [];

	    foreach( $stack as $k => $line ) {
	        $ret[] = sprintf(
	            '%2.s) %s%s%s in %s:%s',
                $k ,
                isset( $line['class'] ) ? $line['class'] : '',
                isset( $line['type'] ) ? $line['type'] : '',
                $line['function'],
                $line['file'],
                $line['line']
            );
        }

	    $this->log( "--------Call stack:-------\n" . implode( "\n", $ret ) );
    }
}

}//<--- Advertikon namespace end
namespace {
	if( ! function_exists( 'adk_log' ) ) {
		function adk_log() {
			global $adk_console;
			call_user_func_array( array( $adk_console, 'log' ), func_get_args() );
		}
	}
}

