<?php 
	trait DBModel{
		
		public function setDna(){
			$time=time();
			$rand=rand(1,99999);
			$setID = $rand.$time.$date;
			return $setID;
		}
		
		public function db($sql, $fetch = false){
			$mysqli = new mysqli(set::config('db_host'), set::config('db_user'), set::config('db_password'), set::config('db_table'));
			if ($mysqli->connect_errno) {
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();
			}
			if ($result = $mysqli->query($sql)) {
				if($fetch){
					while ($row = $result->fetch_all(MYSQLI_ASSOC)) {
						return $row;
					}
					$result->free();
				}
			}
			$mysqli->close();
		}
		
		public function dbRow($sql){
			$rowcount = mysqli_num_rows($this->db($sql));
			return $rowcount;
		}
		
		public function dbColumns($countReturn, $tableName){
			$Result = $this->db("SHOW columns FROM ".$tableName);
			$i=1;
			while($fetch2 = mysqli_fetch_assoc($Result)){
				$GetField = $fetch2['Field'];
				$Explore = explode(" ",$GetField);
				foreach ($Explore as $key=>$value) {
				$res[$i++] = $value;
			}
			}
			return $res[$countReturn];
		}
		
		public function dbCall($TableName, $Return, $value){
			return $this->dbColumns($Return, $TableName).'="'.$value.'"';
		}
		
		public function dbCallOnly($TableName, $Return){
			return $this->dbColumns($Return, $TableName);
		}
		
		public function dbWhere($data, $TableName){
			if($data){
				$WhereString .= ' WHERE ';
				foreach($data as $key=>$value)
				{	
					if(is_numeric ($key)){
						$getColWithNumber = $this->dbColumns($key, $TableName);
						$WhereString .= ' '.$getColWithNumber.'="'.$value.'" AND';
						}else{
						$WhereString .= ' '.$key.'="'.$value.'" AND';
					}
				}
				$getStringWhere = substr_replace($WhereString, "", -3);
				return $getStringWhere;
			}
		}
		
		public function dbSort($data){
			if($data){
				$OrderString .= ' ORDER BY ';
				foreach($data as $key=>$value)
				{	
					if($value === true){
						$OrderSort = 'ASC';
						$separator = ' ';
						} elseif($value === false) {
						$OrderSort = 'DESC';
						$separator = ' ';
						} else{
						$OrderSort='"'.htmlspecialchars($value).'"';
						$separator = '=';
					}
					if(is_numeric ($key)){
						$getColWithNumber = $this->dbColumns($key, $TableName);
						$OrderString .= ' '.$getColWithNumber.$separator.$OrderSort.',';
						}else{
						$OrderString .= ' '.$key.$separator.$OrderSort.',';
					}
				}
				
				$getStringOrder = substr_replace($OrderString, "", -1);
				return $getStringOrder;
				
			}
		}
		
		public function dbLimit($data){
			if($data){
				return $LimitString .= ' LIMIT '.$data;
			}
		}
		
		public function dbJoin($tableName){
			$exploded = explode("-",$value);
			$Table = $exploded[0];
			$Result .= $Table;
			foreach($tableName as $key=>$value)
			{
				$exploded = explode("-",$value);
				$TableFurst = $exploded[0];
				$TableSecond = $exploded[2];
				$JoinPosition = $exploded[1];
				$TableFurstID = $TableFurst.'.'.$TableSecond.'_id';
				$TableSecondID = $TableSecond.'.'.$TableSecond.'_id';
				return $TableFurst.' '.$JoinPosition.' JOIN '.$TableSecond.' ON '.$TableFurstID.'='.$TableSecondID;
			}
		}
		
		public function dbsCode($tableName, $where, $order, $limit){
			$Result = 'SELECT * FROM ';
			if(is_array($tableName)){
				$Result .= $this->dbJoin($tableName);
				} else {
				$Result .= $tableName;
			}
			$Result .= $this->dbWhere($where, $tableName);
			$Result .= $this->dbSort($order);
			$Result .= $this->dbLimit($limit);
			return $Result;
		}
		
		public function dbsSum($Sum, $tableName, $where, $order, $limit, $debugMode = false){
			$Result = 'SELECT SUM('.$Sum.') AS '.$Sum.' FROM ';
			if(is_array($tableName)){
				$Result .= $this->dbJoin($tableName);
				} else {
				$Result .= $tableName;
			}
			$Result .= $this->dbWhere($where, $tableName);
			$Result .= $this->dbSort($order);
			$Result .= $this->dbLimit($limit);
			if($debugMode){
				echo $Result;
				exit;
				} else {
				$ResultSelect = $this->selectOne($Result);
				return $ResultSelect[$Sum];
			}
		}
		
		public function dbu($tableName, $set, $Where = "", $debugMode = false){
			$Result = 'UPDATE ';
			if(is_array($tableName)){
				$Result .= $this->dbJoin($tableName);
				} else {
				$Result .= $tableName;
			}
			$ConvertToSet = $this->dbSort($set);
			$Result .= str_replace(' ORDER BY ',' SET',$ConvertToSet);
			$Result .= $this->dbWhere($Where, $tableName);
			if($debugMode){
				echo $Result;
				exit;
				} else {
				return $this->db($Result);
			}
		}
		
		public function dbd($tableName, $Where = "", $order = "", $limit = "", $debugMode = false){
			$Result = 'DELETE FROM ';
			if(is_array($tableName)){
				$Result .= $this->dbJoin($tableName);
				} else {
				$Result .= $tableName;
			}
			$Result .= $this->dbWhere($Where, $tableName);
			$Result .= $this->dbSort($order);
			$Result .= $this->dbLimit($limit);
			if($debugMode){
				echo $Result;
				exit;
				} else {
				return $this->db($Result);
			}
		}
		
		public function dbiAttr($data, $remove){
			if($data){
				foreach($data as $key=>$value)
				{
					if($remove){
						$backRemove = ''.htmlspecialchars($value).', ';
						} else {
						$backRemove = '"'.htmlspecialchars($value).'", ';
					}
					$columnCode .= $backRemove;
				}
				$getStringColum = substr_replace($columnCode, "", -2);
				
				return $getStringColum;
				} else {
				return false;
			}
		}
		
		public function dbi($tableName, $column, $value, $debugMode = false){
			$Result = 'INSERT INTO '.$tableName.' ('.$tableName.'_id, ';
			$Result .= $this->dbiAttr($column, true).' ) VALUES ('.$this->setDna().', ';
			$Result .= $this->dbiAttr($value, false).' )';
			if($debugMode){
				echo $Result;
				exit;
				} else {
				return $this->db($Result);
			}
		}
		
		public function dbs($tableName, $where = false, $order = false, $limit = false, $debug = false){
			$result = $this->db( $this->dbsCode($tableName, $where, $order, $limit), true );
			if($result == null){
				return array($result);
			} else {
				return $result;
			}
		}
		
		public function getUserByID($colum){
			if($_SESSION['UserID']){
				$sqlResult = $this->dbsOne('Auth', ['auth_id'=>$_SESSION['UserID']], []);
				if($colum){
					return $sqlResult[$colum];
					} else {
					return $sqlResult;
				}
				} else {
				exit;
			}
		}
	}															