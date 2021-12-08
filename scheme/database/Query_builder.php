<?php

    /* Query_builder Functions
     * Extend your Database class, so we can use $db variable (your database connection)
     * Quiery builder is use to make your CRUD code less
     */
        class Query_builder
        {
            
            function __construct()
            {
                // create object
                $database = new Database();
                // get the database connection
                $this->db = $database->db;
            }

            /**
             * get('user') - return all rows from user table
             */
                public function get($table)
                {
                    $query = "SELECT * from $table";
                    $result = $this->db->query($query)
                                        ->fetchAll();
                    return $result;
                }

            /**
             * selectAll('select * from user order by userid') - return all rows from user table
             * selectAll('select * from user where status = "active" ') - return all active users from user table
             */
                public function selectAll($query)
                {
                    $result = $this->db->query($query)
                                        ->fetchAll();
                    return $result;
                }
                
            /**
             * selectRow('select * from user order by userid') - return first/one row from user table
             * selectRow('select * from user where status = "active" ') - return first/one active user from user table
             * selectRow('select * from user where userid = 1 ') - return user from user table where id is 1
             */
                public function selectRow($query)
                {
                    $result = $this->db->query($query)
                                        ->fetch();
                    return $result;
                }

            /**
             * $param = [ $full_name, $contact, $address ];
             * insert('user','full_name,contact,address', $param);
             */
                public function insert($table, $column, $param)
                {
                    
                    $bstr = '';
                    foreach($param as $key => $val)
                    {
                        if($bstr==''){
                            $bstr = $key;
                        }else{
                            $bstr = $bstr .', '. $key;
                        }
                        if(is_integer($key)){
                            $bstr = '';
                            for($i=0;$i<=$key;$i++)
                            {
                                if($bstr==''){
                                    $bstr = '?';
                                }else{
                                    $bstr = $bstr .', ?';
                                }
                            }
                        }
                    } 

                    $query = "INSERT INTO $table ($column) VALUES ($bstr)";
                    $result = $this->db->prepare($query)
                                        ->execute($param);
                    return $result;
                }

            /**
             * $params = [
             *       ':full_name' => $full_name,
             *       ':contact' => $contact,
             *       ':address' => $address
             *   ];
             * update('user',['full_name','contact','address'] ,$params, "user_id=$id");
             */
                public function update($table, $column ,$param, $where)
                {
                    $data = '';
                    $count = 0;
                    foreach($param as $key => $val)
                    {
                        if($data==''){
                            $data = $column[$count] . '=' . $key;
                        }else{
                            $data = $data .', '. $column[$count] . '=' . $key;
                        }
                        if(is_integer($key)){
                            $data = '';
                            for($i=0;$i<=$key;$i++)
                            {
                                if($data==''){
                                    $data = $column[$count] . ' = ?';
                                }else{
                                    $data = $data .', ' . $column[$count] . ' = ?';
                                }
                            }
                        }
                        $count++;
                    }
                    
                    $query = "UPDATE " . $table . " SET " . $data ." WHERE " . $where;
                    $result = $this->db->prepare($query)
                                    ->execute($param);
                    return $result;
                }

            /**
             * delete('DELETE from user WHERE userid=$userid') - delete user
             */
                public function delete($query)
                {
                    $this->db->prepare($query)->execute();
                }

            /**
             * count('user') - count all records from user table
             */
                public function count($table)
                {
                    $query = "SELECT count(*) as cou from $table";
                    $result = $this->db->query($query)
                                        ->fetch()['cou'];
                    return $result;
                }

            /**
             * sum('user', 'credits') - sum of all credits from user table
             */
                public function sum($table, $column)
                {
                    $query = "SELECT sum($column) as su from $table";
                    $result = $this->db->query($query)
                                        ->fetch()['su'];
                    return $result;
                }


        }

?>