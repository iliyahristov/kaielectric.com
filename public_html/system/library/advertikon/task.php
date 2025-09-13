<?php
/**
 * Advertikon Task Class
 * @author Advertikon
 * @package Advertikon
 * @version 1.1.75 
 *
 * To install it run self::install() (as a rule you need to do it during the main extension installation)
 * To uninstall run self::uninstall() (as a rule you need to do it during the mail extension installation)
 * Extension need to have Catalog::controller::amend_task action
 * 
 * To run tasks call self::run(). It should be called via cronjob of some sort
 * In order to correctly end task each task action should have self::stop_task( ID). ID is passed via GET['id']
 */

namespace Advertikon;

class Task {

	private $task = '';
	private $schedule = '';
	private $status = '';
	private $last_run = '';
	private $p_id = '';
	private $threshold = '';
	private $h = '';
	private $tasks = '';
	private $id = '';
	private $table = 'adk_task';
	// protected $connector = null;
	private $mutex_dir = '';
	private $a;

	const MUTEX_NAME = "task";

	/**
	 * Task constructor.
	 * @throws Exception
	 */
	public function __construct() {
		$this->a = Advertikon::instance();
		// $this->connector = array( $this, 'socket_connector' );
		$this->mutex_dir = $this->a->data_dir . 'task/';

		if ( !is_dir( $this->mutex_dir ) ) {
			@mkdir( $this->mutex_dir, 0777, true );
		}
	}

	/**
	 * Initializes object
	 * @return void
	 * @throws Exception
	 */
	private function init() {
		if ( !$this->tasks ) {
			$this->tasks = $this->a->q( array(
				'table' => $this->table,
				'query' => 'select',
			) );
		}
	}

	/**
	 * Installs task manager into system
	 * @return object
	 * @throws Exception
	 */
	public function install() {
		$this->a->db->query( "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . $this->table . "`
		(`id`        INT         UNSIGNED AUTO_INCREMENT KEY,
		 `task`      TEXT,
		 `schedule`  VARCHAR(20),
		 `status`    TINYINT     UNSIGNED DEFAULT 0,
		 `last_run`  DATETIME,
		 `p_id`      VARCHAR(50),
		 `threshold` INT         UNSIGNED
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin" );

		$this->a->log( 'Task table has been created' );

		return $this;
	}

	/**
	 * Removes task manager from the system
	 * @param string $code Module code
	 * @return object
	 * @throws Exception
	 */
	public function uninstall( $code ) {
		$this->a->log( 'Removing task(s)...' );

		$this->a->q( [
			'table' => $this->table,
			'query' => 'delete',
			'where' => [
				'field'     => 'p_id',
				'operation' => '=',
				'value'     => $code,
			],
		] );

		$q = $this->a->q()->log( 1 )->run_query( [
			'table' => $this->table,
			'field' => [ 'count' => 'COUNT(*)']
		] );

		if ( $q['count'] == 0 ) {
			$this->a->log( 'Task table is empty - remove it' );

			$this->a->q( [
				'table' => $this->table,
				'query' => 'drop',
			] );
		}

		return $this;
	}

	/**
	 * Adds cron task
	 * @param string $task Task action (OpenCart action absolute URL)
	 * @param string $schedule Schedule structure (something like * * * * *)
	 * @param $code
	 * @param int $threshold Staleness threshold in seconds
	 * @return object
	 * @throws Exception
	 */
	public function add_task( $task, $schedule, $code, $threshold = 0  ) {
		$exists = $this->a->q( [
			'table' => $this->table,
			'query' => 'select',
			'where' => [
				[
					'field'     => '`task`',
					'operation' => '=',
					'value'     => '"' . $task . '"',
				],
				[
					'field'     => '`schedule`',
					'operation' => '=',
					'value'     => $schedule,
				],
				[
					'field'     => '`threshold`',
					'operation' => '=',
					'value'     => $threshold,
				],
			],
		] );

		if ( !$exists ) return $this; // Error

		if ( !count( $exists ) ) { // Does not exist
			$result = $this->a->q( array(
				'table' => $this->table,
				'query' => 'insert',
				'values' => array(
					'task'      => '"' . $task . '"',
					'schedule'  => $schedule,
					'threshold' => $threshold,
					'p_id'      => $code, // for now using it as a module identifier
				),
			) );

			if ( $result ) {
				$this->a->log( sprintf( "Adding task %s %s %s", $task, $schedule, $threshold ) );

			} else {
				$this->a->log( sprintf( "Failed to add task %s %s %s", $task, $schedule, $threshold ) );
			}

		} else {
			$this->a->log( sprintf( "Task %s %s %s already exists", $task, $schedule, $threshold ) );
		}

		return $this;
	}

	/**
	 * Deletes cron task
	 * @param string $task Task action (OpenCart action absolute URL)
	 * @param string $schedule Schedule structure (something like * * * * *)
	 * @param int $threshold Staleness threshold in seconds
	 * @return object
	 * @throws Exception
	 */
	public function delete_task( $task, $schedule, $threshold = 0 ) {
		$result = $this->a->q( array(
			'table' => $this->table,
			'query' => 'delete',
			'where' => array(
				array(
					'field'     => 'task',
					'operation' => '=',
					'value'     => $task,
				),
				array(
					'field'     => 'schedule',
					'operation' => '=',
					'value'     => $schedule
				),
				array(
					'field'     => 'threshold',
					'operation' => '=',
					'value'     => $threshold
				),
			),
		) );

		if ( $result ) {
			$this->a->log( sprintf( "Deleting task %s %s %s", $task, $schedule, $threshold ) );

		} else {
			$this->a->log( sprintf( "Failed to delete task %s %s %s", $task, $schedule, $threshold ) );
		}

		return $this;
	}

	/**
	 * Checks whether task is exists
	 * @param string $action Task's task action
	 * @param string $schedule Task's schedule
	 * @param int $threshold Task's threshold
	 * @return boolean
	 * @throws Exception
	 */
	public function task_exists( $action, $schedule, $threshold ) {
		$query = $this->a->q( array(
			'table'     => $this->table,
			'field'     => array( 'count' => 'count(*)' ),
			'where'     => array(
				array(
					'field'     => 'task',
					'operation' => '=',
					'value'     => $action,
				),
				array(
					'field'     => 'schedule',
					'operation' => '=',
					'value'     => $schedule,
				),
				array(
					'field'     => 'threshold',
					'operation' => '=',
					'value'     => $threshold,
				),
			),
		) );

		return (boolean)$query['count'];
	}

	/**
	 * Run tasks
	 * @return boolean
	 * @throws Exception
	 */
	public function run() {
		$this->a->log( 'Starting task execution...' );

		$q = $this->a->db->query( 'show tables like "' . DB_PREFIX . $this->table . '"' );

		if ( !$q->num_rows) {
			$this->a->error( 'Tasks table does not exist. Stop execution' );
			return false;
		}

		$this->updateStatus();
		$mutex = new Mutex();

		if( !$mutex->acquire( self::MUTEX_NAME ) ) {
			$this->a->error( sprintf( 'Active task detected. You need to increase interval between the tasks run.' ) );
			return false;
		}

		while( $this->fetch_new() ) {
			$this->run_task();
		}

		$mutex->release( self::MUTEX_NAME );

		return true;
	}

	private function updateStatus() {
		if ( !@touch( $this->mutex_dir . 'cron' ) ) {
			$this->a->error( "Failed to update task status" );

		} else {
			$this->a->log( 'Task status updated' );
		}
	}

	/**
	 * Checks task status
	 * @return TaskStatus
	 * cron - if CRON JOB is set correctly
	 * task - if task is running
	 * count - number of active tasks
	 * @throws Exception
	 */
	public function get_status() {
		$ret = new TaskStatus();
		$query = $this->a->db->query( "SHOW TABLES LIKE '" . DB_PREFIX . $this->table . "'" );

		if ( $query && $query->row ) {
			$ret->isInstalled = true;

			// Cron is active
			if ( is_file( $this->mutex_dir . 'cron' ) && time() - fileatime( $this->mutex_dir . 'cron' ) < 60 * 60 * 10 ) {
				$ret->cronActive = true;
			}

			$ret->taskRunning = !(new Mutex())->acquire( self::MUTEX_NAME );

			$q = $this->a->q()->log( 0 )->run_query( [
				'table' => $this->table,
				'query' => 'select',
				'field' => [ 'count' => 'count(*)', ],
			] );

			if ( count( $q ) ) {
				$ret->tasksCount = $q['count'];
			}
		}

		return $ret;
	}

	/**
	 * @return string
	 * @throws Exception
	 */
	public function get_status_text() {
		$status  = $this->get_status();
		$error_w = '<span style="color: red; font-weight: bold;">%s</span>';
		$ok_w    = '<span style="color: green; font-weight: bold;">%s</span>';

		if ( !$status->isInstalled ) {
			$ret = sprintf( $error_w, $this->a->__( 'Task manager is not installed. Uninstall/install the module to fix it' ) );

		} else if ( !$status->tasksCount ) {
			$ret = sprintf( $error_w, $this->a->__( 'No one task is registered. Uninstall/install the module to fix it' ) );

		} else if ( !$status->cronActive ) {
			$ret = sprintf( $error_w, $this->a->__( 'Task manager is not working. Add task endpoint as crontab job' ) );

		} else {
			$ret = sprintf( $ok_w, $this->a->__( 'OK' ) );
		}

		return $ret;
	}

	/**
	 * Marks task as running
	 * @return boolean Operation status
	 * @throws Exception
	 */
	public function run_task() {
		if ( !$this->id ) {
			$this->a->error( 'Task ID is missing. Task queue needs to be initialized beforehand' );

			return false;
		}

		$this->a->log( "Start task {$this->task}" );
		$this->a->console->profiler( 'task' );

		$output = '';
		$this->a->do_clean( function() {
			// Class::Method notation
			if ( ( $pos = strpos( $this->task, '::' ) ) !== false ) {
				$class = substr( $this->task, 0 , $pos );
				$method = substr( $this->task, $pos + 2 );
				$class = new $class;
				$class->{$method}();

			} else {
				$url = new Url( $this->a );
				$query = $url->parse( $this->task )->get_query();

				if ( !isset( $query['route'] ) ) {
					$this->a->error( "Failed to fetch route for task {$this->task}" );
					return;
				}

				$this->a->load->controller( $query['route'] );
			}

		}, $output );

		$this->a->log( "End task {$this->task}" );
		$this->a->console->profiler( 'task' );

		if ( $output ) {
			$this->a->error( 'Output from task script', $output );
			return false;
		}

		return true;
	}

	/**
	 * Fetches new task from queue
	 * @return boolean Operation result
	 * @throws Exception
	 */
	private function fetch_new() {
		$this->init();

		if ( $this->task ) {
			$this->reset();
			$this->tasks->next();
		}

		while ( $this->tasks->valid() && !$this->is_scheduled() ) {
			$this->tasks->next();
		}

		if ( $this->tasks->valid() ) {
			$task = $this->tasks->current();

			$this->task      = $task['task'];
			$this->schedule  = $task['schedule'];
			$this->status    = $task['status'];
			$this->last_run  = $task['last_run'];
			$this->p_id      = $task['p_id'];
			$this->threshold = $task['threshold'];
			$this->id        = $task['id'];

			return true;
		}

		return false;
	}

	/**
	 * Resets task
	 * @return void
	 */
	private function reset() {
		$this->task      = '';
		$this->schedule  = '';
		$this->status    = '';
		$this->last_run  = '';
		$this->p_id      = '';
		$this->threshold = '';
		$this->id        = '';
	}

	/**
	 * Checks whether task is scheduled to be run NOW
	 * @param null $schedule
	 * @return boolean
	 * @throws Exception
	 */
	private function is_scheduled( $schedule = null ) {
		if ( is_null( $schedule ) ) {
			$task = $this->tasks->current();
			$schedule = $task['schedule'];
		}

		$date = new \DateTime();
		$parts = explode( ' ', $schedule );

		if ( ! isset( $parts[ 4 ] ) ) {
			$this->a->error( sprintf( 'Task schedule: invalid schedule format: "%s"', $schedule ) );
			return false;
		}

		return  $this->is_min( $parts[0], $date ) &&
				$this->is_hour( $parts[1], $date ) &&
				$this->is_month( $parts[3], $date ) &&
				( $this->is_day( $parts[2], $date ) ||
				$this->is_week_day( $parts[4], $date ) );
	}

	/**
	 * Checks minute part of task schedule
	 * @param string $min Minutes part of schedule
	 * @param object $date DateTime object
	 * @return boolean
	 * @throws Exception
	 */
	private function is_min( $min, $date ) {
		try {
			if ( false === ( $parts = $this->parse_part( $min ) ) ) {
				throw new Exception( 'error' );
			}

			if ( '*' === $parts['from'] ) {
				return true;
			}

			$min = (int)$date->format( 'i' );

			if ( $parts['from'] < 0 || $parts['from'] > 59 ) {
				throw new Exception( 'error' );
			}

			if ( $parts['to'] < 0 || $parts['to'] > 59 ) {
				throw new Exception( 'error' );
			}

			if ( $min < $parts['from'] || $min > $parts['to'] || 0 !== $min % $parts['divider'] ) {
				return false;
			}

		} catch ( Exception $e ) {
			$this->a->error( 'Task schedule: invalid format of schedule\'s minutes part' );
			return false;
		}

		return true;
	}

	/**
	 * Checks hour's part of task schedule
	 * @param $hour
	 * @param object $date DateTime object
	 * @return boolean
	 * @throws Exception
	 */
	private function is_hour( $hour, $date ) {
		try {

			if ( false === ( $parts = $this->parse_part( $hour ) ) ) {
				throw new Exception( 'error' );
			}

			if ( '*' === $parts['from'] ) {
				return true;
			}

			$min = (int)$date->format( 'H' );

			if ( $parts['from'] < 0 || $parts['from'] > 23 ) {
				throw new Exception( 'error' );
			}

			if ( $parts['to'] < 0 || $parts['to'] > 23 ) {
				throw new Exception( 'error' );
			}

			if ( $hour < $parts['from'] || $hour > $parts['to'] || 0 !== $hour % $parts['divider'] ) {
				return false;
			}

		} catch ( Exception $e ) {
			$this->a->error( 'Task schedule: invalid format of schedule\'s hours part' );
			return false;
		}

		return true;
	}

	/**
	 * Checks day's part of task schedule
	 * @param $day
	 * @param object $date DateTime object
	 * @return boolean
	 * @throws Exception
	 */
	private function is_day( $day, $date ) {
		try {

			if ( false === ( $parts = $this->parse_part( $day ) ) ) {
				throw new Exception( 'error' );
			}

			if ( '*' === $parts['from'] ) {
				return true;
			}

			$day = (int)$date->format( 'd' );

			if ( $parts['from'] < 1 || $parts['from'] > 31 ) {
				throw new Exception( 'error' );
			}

			if ( $parts['to'] < 1 || $parts['to'] > 31 ) {
				throw new Exception( 'error' );
			}

			if ( $day < $parts['from'] || $day > $parts['to'] || 0 !== $day % $parts['divider'] ) {
				return false;
			}

		} catch ( Exception $e ) {
			$this->a->error( 'Task schedule: invalid format of schedule\'s day part' );
			return false;
		}

		return true;
	}

	/**
	 * Checks month's part of task schedule
	 * @param $month
	 * @param object $date DateTime object
	 * @return boolean
	 * @throws Exception
	 */
	private function is_month( $month, $date ) {
		try {

			if ( false === ( $parts = $this->parse_part( $month ) ) ) {
				throw new Exception( 'error' );
			}

			if ( '*' === $parts['from'] ) {
				return true;
			}

			$month = (int)$date->format( 'm' );

			if ( $parts['from'] < 1 || $parts['from'] > 12 ) {
				throw new Exception( 'error' );
			}

			if ( $parts['to'] < 1 || $parts['to'] > 12 ) {
				throw new Exception( 'error' );
			}

			if ( $month < $parts['from'] || $month > $parts['to'] || 0 !== $month % $parts['divider'] ) {
				return false;
			}

		} catch ( Exception $e ) {
			$this->a->error( 'Task schedule: invalid format of schedule\'s month part' );
			return false;
		}

		return true;
	}

	/**
	 * Checks minute part of task schedule
	 * @param $day
	 * @param object $date DateTime object
	 * @return boolean
	 * @throws Exception
	 */
	private function is_week_day( $day, $date ) {
		try {

			if ( false === ( $parts = $this->parse_part( $day ) ) ) {
				throw new Exception( 'error' );
			}

			if ( '*' === $parts['from'] ) {
				return true;
			}

			// 1 though 7
			$day = (int)$date->format( 'N' );

			if ( $parts['from'] < 0 || $parts['from'] > 7 ) {
				throw new Exception( 'error' );
			}

			if ( $parts['to'] < 0 || $parts['to'] > 7 ) {
				throw new Exception( 'error' );
			}

			if ( 0 === $parts['from'] ) {
				$parts['from'] = 7;
			}

			if ( 0 === $parts['to'] ) {
				$parts['to'] = 7;
			}

			if ( $day < $parts['from'] || $day > $parts['to'] || 0 !== $day % $parts['divider'] ) {
				return false;
			}

		} catch ( Exception $e ) {
			$this->a->error( 'Task schedule: invalid format of schedule\'s week\'s day part' );
			return false;
		}

		return true;
	}

	/**
	 * Parses schedule's parts (0/2, * / 1, 2-6/2 )
	 * @param string $part Schedule's part
	 * @return array|false
	 */
	private function parse_part( $part ) {
		if ( ! preg_match( '/(\*|\d+)(?:\s*-\s*(\d+))?(?:\s*\/\s*(\d+))?/', $part, $m ) ) {
			return false;
		}

		return array(
			'from'    => '*' === $m[1] ? '*' : (int)$m[1],
			'to'      => isset( $m[2] ) ? (int)$m[2] : (int)$m[1],
			'divider' => isset( $m[3] ) ? (int)$m[3] : 1,
		);
	}
}

class TaskStatus {
	public $cronActive  = false; // ran at least 10 min before
	public $taskRunning = false; // task is running at the moment
	public $tasksCount  = 0; // number of installed tasks
	public $isInstalled = false; // exists in DB
}
