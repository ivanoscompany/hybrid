<?php 
	trait DBModel{
		
		public function setDna(){
			$time=time();
			$date=date("Ymd",$time);
			$rand=rand(1,1000);
			$setID = $rand.$time.$date;
			return $setID;
		}
		
		public function db($sql){
			$mysqli = new mysqli(
			set::config('db_host'), 
			set::config('db_user'), 
			set::config('db_password'), 
			set::config('db_table')
			);
			$mysqli->set_charset("utf8");
			$query = $mysqli->query($sql);
			if(!$mysqli->query($sql)){
				printf("Error message: %s\n", $mysqli->error);
				exit;
				} else {
				return $query;
			}
		}
		
		public function select($sql){
			$dbdata = array();
			while($fetch = mysqli_fetch_assoc($this->db($sql))){
				$dbdata[]=$fetch;
			}
			return $dbdata;
		}
		
		public function selectOne($sql){
			$Result = self::select($sql);
			$getPop = array_pop($Result);
			return $getPop;
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
		
		public function dbu($tableName, $set, $Where, $debugMode = false){
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
		
		public function dbd($tableName, $Where, $order, $limit, $debugMode = false){
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
			$Result = 'INSERT INTO '.$tableName.' (';
			$Result .= $this->dbiAttr($column, true).' ) VALUES (';
			$Result .= $this->dbiAttr($value, false).' )';
			if($debugMode){
				echo $Result;
				exit;
			} else {
				return $this->db($Result);
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
		
		public function dbs($tableName, $where, $order, $limit){
			return $this->select( $this->dbsCode($tableName, $where, $order, $limit) );
		}
		
		public function dbsOne($tableName, $where, $order){
			return $this->selectOne( $this->dbsCode($tableName, $where, $order, $limit) );
		}
		
		public function dbsRow($tableName, $where, $order){
			return $this->dbRow( $this->dbsCode($tableName, $where, $order, $limit) );
		}
		
		public function dbsWhile($tableName){
			return $this->select( $this->dbsCode($tableName, $where, $order, $limit) );
		}
		
		public function dbsWhere($tableName, $where){
			return $this->select( $this->dbsCode($tableName, $where, $order, $limit) );
		}
		
	}													