<?php defined('EXEC') or die;

/**
 * @file db.php
 * @author  Ondřej Záruba
 * @version 0.6
 *
 * @class DB
 * @brief Database connection.
 * 
 * How to use the class DB. \n
 * DB::Connect(); \n
 * $ga = new ODB; \n
 *	$ga->Query("SELECT * FROM #_accesses WHERE name='%s' ","new_user");\n
 *	$ga->FetchAssoc(); \n 
 *	echo $ga->Get('name'); \n
 * $ga->Close(); \n
 * DB::Disconnect(); \n
*/
 
class SQL
{
	private $query,$row,$result=NULL;
	private static $db=NULL;
	
	function __destruct()
	{
		if(is_object($this->result))
			$this->close();
	}
/**
 *  @brief Open a connection to a MySQL server with configuration in /conf/mysql.php ,or dups error.   
 */
	public static function connect()
	{
		require_once './conf/mysql.php';

		self::$db=new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_database) or die("Problem connecting: ".mysqli_error($sql));

		if (self::$db->connect_error) 
		{
			 die('Connect Error (' . self::$db->connect_errno . ') ' . self::$db->connect_error);
		}
		
		self::$db->set_charset("utf8");
	}
/**
 *  \brief Disconnects from MySQL server.   
 */
	public static function disconnect()
	{
		if (self::$db!=NULL) 
		{
			self::$db->close();
		}
	}
/**
 *  \brief Return connection to MySql server.   
 */
	public static function getConnection()
	{
		return self::$db;
	}
/**
 *  \brief Escapes special characters in a string for use in an SQL statement.   
 */
	public static function realEscapeString($string)
	{
		return self::$db->real_escape_string($string);
	}
/**
 *  \brief Send MySql query which is formated as c style printf string. Other variables are parametres for query.
 * 	
 * Example: Query("Select * FROM xy WHERE id='%d'",23)  
 * 
 * 
 * \return Result fo query.
 */
	public function query()
	{
	    $args = func_get_args();
	    $query = array_shift($args);
	    for($i=0;$i<count($args);$i++)
	    {
			if(is_scalar($args[$i]))
			{
				if(is_string($args[$i]))
				{
					$args[$i]=self::$db->real_escape_string($args[$i]);
				}
			}
			else
			{
				if($i==0 && is_array($args[0]))
				{
					$i=-1;
					$args=$args[0];
                }
			}
		}
        $this->query = vsprintf($query,$args);
		$this->result=self::$db->query($this->query);
		
		return $this->result;
	}
	
/**
 *  \brief Get the query string.
 * 	\return String with query, which is send to DB. 
 */
	public function getQueryString()
	{
		return $this->query;
	}
		
	public function getInsertId()
	{
		return self::$db->insert_id;
	}
	
	public function execute()
	{
		$this->result=self::$db->query($this->query);
	}
/**
 * 	\return Number of rows in last fetch.
 */
	public function numRows()
	{
		return $this->result->num_rows;
	}
	
	public function dataSeek($n)
	{
		return $this->result->data_seek($n);
	}
	
	public function fetchRow()
	{
		return $this->row=$this->result->fetch_row();
	}
	
	public function fetchAssoc()
	{
		return $this->row=$this->result->fetch_assoc();
	}

	public function get($column_index)
	{
		return $this->row[$column_index];
	}
    
	public function error()
	{
		return self::$db->error;
	}
    
	public function close()
	{
		if($this->result!=NULL)
		{
			$this->result->close();
			unset($this->row);
			$this->query='';
		}
		$this->result=NULL;
	}
} 
?>
