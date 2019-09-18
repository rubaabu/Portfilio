<?php

require 'DBsetup.php';

class DBlogin extends DBsetup {

    // Checks if the login is valid
    // 1. Parameter is an array( $email , $password )
    // If the login is valid it returns the entry for that user
    // If the login is invalid it returns 'fail' 
    public function checkCredentials($credentials) {

        $email = $credentials['email'];
        $password = $credentials['password'];

        $sql = "SELECT * FROM user WHERE user_email='".$email."' AND user_password='".$password."';";

        $this->connect();
        $query_result = mysqli_query($this->conn,$sql);
        $this->disconnect();

        

        $entry_count = mysqli_num_rows($query_result);
        $record_data = $query_result->fetch_all(MYSQLI_ASSOC);

        if ($entry_count == 1) {
            return $record_data[0];
        } else {
            return 'fail';
        }

    }

    // Checks if user is currently banned
    // 1. Parameter user id
    // Output 'banned' or 'safe'
    public function checkIfBanned($user_id) {

        $current_date = date('Y-m-d');

        $sql = "SELECT * FROM banned_user WHERE fk_user_id = '".$user_id."' AND banned_user_date_unbanning > '".$current_date."';";

        $entry_count = $this->queryForEntryCount($sql);

        if ($entry_count > 0) {

            return 'banned';

        } else {

            return 'safe';

        }

    }

    // Changes the last login datetime
    // 1. Parameter user id
    // Output succes or error
    public function makeLastLogin($user_id) {

        $data = array(
            'user_last_login' => date('Y-m-d H:i:s')
        );

        return $this->makeModifyQuery('user',$data,$user_id);

    }

}

class DBregistration extends DBsetup {

    // Checks if the Email already exists in the database
    // 1. Parameter is the email that we want to check
    // If the email exists the output will be true
    // If the email does not exist output will be false
    public function doesEmailExist($email) {

        $sql = "SELECT * FROM user WHERE user_email='".$email."';";

        $entry_count = $this->queryForEntryCount($sql);

        if ($entry_count > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function doesUserExist($username) {

        $sql = "SELECT * FROM user WHERE user_nickname='".$username."';";

        $entry_count = $this->queryForEntryCount($sql);

        if ($entry_count > 0) {
            return true;
        } else {
            return false;
        }

    }

    // Adds User to the Database
    // 1. Parameter is an array( 'index' => 'value' )
    //      1.1 The index of an value is the column name and the value is the column value
    // If the query was a success it outputs 'success'
    // If the query failed it outputs the query error
    public function addUserToDatabase($user_data) {

        return $this->makeInsertQuery('user',$user_data);

    }

}