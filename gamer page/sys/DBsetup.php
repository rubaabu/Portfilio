<?php

class DBsetup {

    public $hostDB = 'localhost';
    public $userDB = 'root';
    public $passDB = '';
    public $databaseDB = 'gamer_community';

    public $conn;

    // Establishes a connection with the database
    public function connect() {

        $this->conn = mysqli_connect($this->hostDB,$this->userDB,$this->passDB,$this->databaseDB);
        mysqli_set_charset($this->conn,"utf8");

    }

    // Closes existend connection to the database
    public function disconnect() {

        $this->conn = mysqli_close($this->conn);

    }

    // Querys an SQL string and outputs entry count
    // 1. Parameter is the SQL string
    // Output is the entry_count
    public function queryForEntryCount($sql) {

        $this->connect();
        $query_result = mysqli_query($this->conn,$sql);
        $this->disconnect();

        $entry_count = mysqli_num_rows($query_result);

        return $entry_count;

    }

    // Inserts to database
    // 1. Parameter is the table name
    // 2. Parameter is an array( 'index' => 'value' )
    //      1.1 The index of an value is the column name and the value is the column value
    // Output success or fail
    public function makeInsertQuery($table,$data) {

        $column_names = '';
        $column_values = '';

        foreach ($data as $key => $value) {
            if ($column_names == '') {
                $column_names .= $key;
                $column_values .= "'".$value."'";
            } else {
                $column_names .= ",".$key;
                $column_values .= ",'".$value."'";
            }
        }

        $sql = "INSERT INTO ".$table." (".$column_names.") VALUES (".$column_values.");";

        return $this->makeBoolQuery($sql);

    }

    // Returns success or fail if query fails or not
    // 1. Parameter SQL string
    // Output if failed 'fail'
    // Output if success 'success'
    public function makeBoolQuery($sql) {

        $this->connect();

        mysqli_query($this->conn,$sql);
        $error = mysqli_error($this->conn);

        $this->disconnect();

        if ($error == '') {
            return 'success';
        } else {
            return $error;
        }

    }

    // Modifies records
    // 1. Parameter table name
    // 2. Parameter array data
    // 3. Parameter record id
    // Output success or fail
    public function makeModifyQuery($table,$modify_data,$id) {

        $column_mod = '';

        foreach ($modify_data as $key => $value) {
            if ($column_mod == '') {
                $column_mod .= $key."='".$value."'";
            } else {
                $column_mod .= ",".$key."='".$value."'";
            }
        }

        $sql = "UPDATE ".$table." SET ".$column_mod." WHERE ".$table."_id = '".$id."';";

        return $this->makeBoolQuery($sql);
    }

}