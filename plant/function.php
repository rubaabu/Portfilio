<?php 

class DBsetup {

   

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

        require 'db.php';

       

        $result =mysqli_query($conn,$sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        $error = mysqli_error($conn);

       
        $conn->close();
        if ($error == '') {
            return 'success';
        } else {
            return $error;
        }

    } 


    // Assembles error for forms
    // 1. Parameter is the current error message
    // 2. Parameter is the error message that we want to add
    // 3. Parameter is the id of the input tag
    // Output is the complete error message
    public function assembleError($currentError,$errorMsg,$id) {

        if ($currentError == '') {
            $currentError .= $id.'/2s'.$errorMsg;
        } else {
            $currentError .= '/1s'.$id.'/2s'.$errorMsg;
        }

        return $currentError;

    }




    


    // 1. Parameter is an array( 'index' => 'value' )
    //      1.1 The index of an value is the column name and the value is the column value
    // If the query was a success it outputs 'success'
    // If the query failed it outputs the query error

    public function userOrder($buy_data) {

        $this->makeInsertQuery('buy',$buy_data);
    }



    // 1. Parameter is an array( 'index' => 'value' )
    //      1.1 The index of an value is the column name and the value is the column value
    // If the query was a success it outputs 'success'
    // If the query failed it outputs the query error
    public function employmentApp($employment_data){

        $this->makeInsertQuery('employment_app',$employment_data);
    }


     // 1. Parameter is an array( 'index' => 'value' )
    //      1.1 The index of an value is the column name and the value is the column value
    // If the query was a success it outputs 'success'
    // If the query failed it outputs the query error
    public function hiring($hiring_data){

        $this->makeInsertQuery('employees',$hiring_data);
    }


     // 1. Parameter is an array( 'index' => 'value' )
    //      1.1 The index of an value is the column name and the value is the column value
    // If the query was a success it outputs 'success'
    // If the query failed it outputs the query error
    public function paysalary($salary_data){

        $this->makeInsertQuery('salary',$salary_data);
    }

    

    // 1. Parameter is an array( 'index' => 'value' )
    //      1.1 The index of an value is the column name and the value is the column value
    // If the query was a success it outputs 'success'
    // If the query failed it outputs the query error
    public function sendRequest($request_data){

        $this->makeInsertQuery('requests',$request_data);
    }

    

       

    }