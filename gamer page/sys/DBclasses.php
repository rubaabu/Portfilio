<?php

require 'DBsetup.php';

class userClass extends DBsetup {

    // Creates friendship entry with status pending
    // 1. Parameter is an array( 'index' => 'value' )
    //      1.1 The index of an value is the column name and the value is the column value
    // Output 'success' when successful
    // Output 'fail' when query fails
    // Output 'Already sent request' when already friends or already requested
    public function makeFriendRequest($request_data) {

        $check_result = $this->friendStatusCheck($request_data['fk_user_id_1'],$request_data['fk_user_id_2']);

        if (!$check_result) {
            
            return $this->makeInsertQuery('friendship',$request_data);

        } else {
            return 'Already sent request';
        }

    }

    // Changes friendship status to active
    // 1. Parameter id of the friendship
    // Output success or fail
    public function acceptFriendRequest($friendship_id) {

        $sql = "UPDATE friendship SET friendship_status = 'active' WHERE friendship_id='".$friendship_id."';";

        return $this->makeBoolQuery($sql);

    }

    // Deletes friendship
    // 1. Parameter id of the friendship
    // Output success or fail
    public function deleteFriend($friendship_id) {

        $sql = "DELETE FROM friendship WHERE friendship_id= '".$friendship_id."';";

        return $this->makeBoolQuery($sql);
    }

    // Gets every friend from a user
    // 1. Parameter id of the user that we want to get his friends
    // Output array with all his friends
    public function seeMyFriends($user_id) {

        $sql = "SELECT friendship_id as id, u1.user_nickname as user_1, u1.user_img as img_1, u1.user_id as id_1, u2.user_nickname as user_2, u2.user_img as img_2, u2.user_id as id_2, friendship_status FROM friendship 
        JOIN user u1 ON fk_user_id_1 = u1.user_id 
        JOIN user u2 ON fk_user_id_2 = u2.user_id 
        WHERE fk_user_id_1 = '".$user_id."' OR fk_user_id_2 = '".$user_id."';";

        $this->connect();

        $result = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $friend_count = mysqli_num_rows($result);

        if ($friend_count > 0) {
            $big_friend_table = array();
            $friends_data = $result->fetch_all(MYSQLI_ASSOC);

            foreach ($friends_data as $key => $value) {
                $big_friend_table[$value['id']] = array(
                    $value['id_1'] => array(
                        $value['user_1'],
                        $value['img_1'],
                        $value['friendship_status']
                    ),
                    $value['id_2'] => array(
                        $value['user_2'],
                        $value['img_2'],
                        $value['friendship_status']
                    )
                );
            }

            foreach ($big_friend_table as $key => $value) {
                unset($big_friend_table[$key][$user_id]);
            }

            return $big_friend_table;
        } else {
            return 'no friends found';
        }

    }

    // Gets friendship status of a friendship
    // 1. Parameter id of the user
    // 2. Parameter id of the other user we want to check if they are friends
    // Output array with friendship id and friendship status
    public function friendStatusCheck($user_id,$target_id) {

        $sql = "SELECT friendship_status, friendship_id FROM friendship WHERE fk_user_id_1='".$user_id."' AND fk_user_id_2='".$target_id."' OR fk_user_id_1='".$target_id."' AND fk_user_id_2='".$user_id."';";

        $this->connect();

        $res = mysqli_query($this->conn,$sql);
        $rows_count = mysqli_num_rows($res);
        
        if ($rows_count == 1) {

            $data = $res->fetch_all(MYSQLI_ASSOC)[0];

            $status = $data['friendship_status'];
            $id = $data['friendship_id'];

            $this->disconnect();

            return array(
                'status' => $status,
                'id' => $id
            );

        } else {

            $this->disconnect();
    
            return false;

        }

    }

    // Lists all friend request from user
    // 1. Parameter user id
    // Output friend requests
    public function seeMyFriendRequests($user_id) {
        $sql = "SELECT friendship_id, user_nickname, user_img FROM friendship 
                JOIN user ON fk_user_id_1 = user_id 
                WHERE fk_user_id_2 = '".$user_id."' AND friendship_status = 'pending';";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        return $result_raw->fetch_all(MYSQLI_ASSOC);
    }

    // Checks if the user made a friend request to the target
    // 1. Parameter user id
    // 2. Parameter target id
    // Output true or false
    public function didIRequest($user_id,$target_id) {
        $sql = "SELECT * FROM friendship WHERE fk_user_id_1 = '".$user_id."' AND fk_user_id_2 = '".$target_id."' AND friendship_status = 'pending';";

        $record_count = $this->queryForEntryCount($sql);

        if ($record_count > 0) {
            return true;
        } else {
            return false;
        }
    }





    // Creates group
    // 1. Parameter is an array with grop data
    // Output success or fail
    public function createGroup($group_data) {

        if ($this->checkGroupName($group_data['community_name'])) {

            return $this->makeInsertQuery('community',$group_data);

        } else {

            return 'fail';

        }
    }

    // Deletes group
    // 1. Parameter is the group id
    // Output success or fail
    public function deleteGroup($group_id) {

        $sql = "DELETE FROM community WHERE community_id='".$group_id."';";


        return $this->makeBoolQuery($sql);

    }

    // Modifies group information
    // 1. Parameter is an array with modifing data
    // 2. Parameter is the group id
    // Output success or fail
    public function modifyGroup($group_data,$group_id) {

        return $this->makeModifyQuery('community',$group_data,$group_id);

    }

    // Checks if groupname is already taken
    // 1. Parameter group name
    // Output if already taken false
    // Output if not taken true
    public function checkGroupName($group_name) {

        $sql = "SELECT * FROM community WHERE community_name='".$group_name."';";

        $record_count = $this->queryForEntryCount($sql);

        if ($record_count > 0) {
            return false;
        } else {
            return true;
        }

    }

    // Joins Group
    // 1. Parameter is the group id
    // 2. Parameter is the user_id
    // Output success or fail
    public function joinGroup($group_id,$user_id) {

        $sql = "INSERT INTO community_member (fk_user_id,fk_community_id,community_member_status) VALUES ('".$user_id."','".$group_id."','active')";

        return $this->makeBoolQuery($sql);

    }

    // Reguest Group to join
    // 1. Parameter is the group id
    // 2. Parameter is the user_id
    // Output success or fail
    public function makeRequestGroup($group_id,$user_id) {
        
        $sql = "INSERT INTO community_member (fk_user_id,fk_community_id,community_member_status) VALUES ('".$user_id."','".$group_id."','pending')";

        return $this->makeBoolQuery($sql);

    }

    // leaves Group
    // 1. Parameter is the group id
    // 2. Parameter is the user_id
    // Output success or fail
    public function leaveGroup($group_id,$user_id) {

        $sql = "DELETE FROM community_member WHERE fk_user_id='".$user_id."' AND fk_community_id='".$group_id."';";

        return $this->makeBoolQuery($sql);

    }

    // Gets every group from a user
    // 1. Parameter user id
    // Out put array = groups the user is in
    public function seeMyGroups($user_id) {

        $sql = "SELECT community_id, community_img, community_name, community_description, community_member_status FROM community_member
        JOIN community on fk_community_id = community_id
        WHERE fk_user_id = '".$user_id."';";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        return $result_data;

    }




    // 1. Parameter is an array( 'index' => 'value' )
    //      1.1 The index of an value is the column name and the value is the column value
    // If the query was a success it outputs 'success'
    // If the query failed it outputs the query error

    public function sendSupportMessagetoAdm($support_message_data) {

        $this->makeInsertQuery('support_message',$support_message_data);
    }

    // Delete support message
    // 1. Parameter id of the support message
    // Output success or fail

    public function deleteSupportMessage($support_message_id) {

        $sql = "DELETE FROM support_message WHERE support_message_id ='.{$support_message_id}.';";

            return $this->makeBoolQuery($sql);
    }






    // 1. Parameter is an array( 'index' => 'value' )
    //      1.1 The index of an value is the column name and the value is the column value
    // If the query was a success it outputs 'success'
    // If the query failed it outputs the query error

    public function createPost($post_data) {

        return $this->makeInsertQuery('post',$post_data);
    }



    // 1. Parameter array data
    // 2. Parameter record id
    // If the query was a success it outputs 'success'
    // If the query failed it outputs the query error
    public function editPost($edit_post_data,$id) {

        return $edit_post->makeModifyQuery('post',$edit_post_data,$id);    
    }



    // Delete post
    // 1. Parameter id of the post
    // Output success or fail

    public function deletePost($post_id) {

        $sql = "DELETE FROM post WHERE post_id = '".$post_id."';";

        return $this->makeBoolQuery($sql);
    }

    // Get users posts
    // 1. Parameter user id
    // Output user posts
    public function getMyPosts($user_id) {
        $sql = "SELECT fk_community_id as id FROM community_member WHERE fk_user_id = '".$user_id."';";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        $condition = '';
        foreach ($result_data as $key => $value) {
            if ($condition == '') {
                $condition .= "fk_community_id='".$value['id']."' ";
            } else {
                $condition .= "OR fk_community_id='".$value['id']."' ";
            }
        }

        if ($condition != '') {
            $sql = "SELECT * FROM post 
            JOIN user ON fk_user_id = user_id
            JOIN community ON fk_community_id = community_id
            WHERE ".$condition." 
            ORDER BY post_date_time DESC;";
    
            $this->connect();
    
            $result_raw = mysqli_query($this->conn,$sql);
    
            $this->disconnect();
    
            return $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);
        }

    }

    // checks if post is users post
    // 1. Parameter user id
    // 2. Parameter post id
    // Output true or false
    public function checkIfMyPost($user_id,$post_id) {
        $sql = "SELECT * FROM post WHERE fk_user_id = '".$user_id."' AND post_id = '".$post_id."';";

        $count = $this->queryForEntryCount($sql);

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    // gets every post from a group
    // 1. Parameter group id
    // Output posts
    public function getGroupPosts($group_id) {
        $sql = "SELECT * FROM post
                JOIN user ON fk_user_id = user_id
                WHERE fk_community_id = '".$group_id."'
                ORDER BY post_date_time DESC;";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        return $result_data;
    }

    // gets every group member
    // 1. Parameter group id
    // Output members
    public function getGroupMembers($group_id) {
        $sql = "SELECT * FROM community_member
                JOIN user ON fk_user_id = user_id
                WHERE fk_community_id = '".$group_id."' AND community_member_status = 'active'
                ORDER BY community_member_join_date DESC;";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        return $result_data;
    }

    // gets every group game
    // 1. Parameter group id
    // Output games
    public function getGroupGames($group_id) {
        $sql = "SELECT * FROM game_connect
                JOIN games ON fk_game_id = game_id
                JOIN game_tag ON fk_game_tag_id = game_tag_id
                WHERE fk_community_id = '".$group_id."';";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        return $result_data;
    }

    public function getGroupGames2($group_id) {
        $sql = "SELECT game_id, game_name, fk_game_tag_id, game_img, game_price FROM game_connect
                JOIN games ON fk_game_id = game_id
                WHERE fk_community_id = '".$group_id."'
                ORDER BY game_id DESC;";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        return $result_data;
    }

    public function getAllGames() {
        $sql = "SELECT * FROM games ORDER BY game_id DESC;";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        return $result_data;
    }

    public function addGroupGame($group_id,$game_id) {
        $data = array(
            'fk_game_id' => $game_id,
            'fk_community_id' => $group_id
        );

        return $this->makeInsertQuery('game_connect',$data);
    }

    public function removeGroupGame($group_id,$game_id) {
        $sql = "DELETE FROM game_connect WHERE fk_community_id = '".$group_id."' AND fk_game_id = '".$game_id."';";

        return $this->makeBoolQuery($sql);
    }

    public function getGroupId($group_name) {
        $sql = "SELECT community_id FROM community WHERE community_name = '".$group_name."';";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        return $result_data[0]['community_id'];
    }

    // gets group info
    // 1. Parameter group id
    // Output group info
    public function getGroupInfo($group_id) {
        $sql = "SELECT * FROM community WHERE community_id = '".$group_id."';";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        return $result_data;
    }

    public function amIInGroup($user_id,$group_id) {
        $sql = "SELECT * FROM community_member WHERE fk_user_id = '".$user_id."' AND fk_community_id = '".$group_id."';";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        if (isset($result_data[0])) {
            return $result_data[0];
        }
    }

    public function adminOfGroup($user_id,$group_id) {
        $sql = "SELECT * FROM community WHERE community_owner = '".$user_id."' AND community_id = '".$group_id."';";

        $count = $this->queryForEntryCount($sql);

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getGroupRequests($user_id) {
        $sql = "SELECT * FROM community_member
                JOIN community ON fk_community_id = community_id
                JOIN user ON fk_user_id = user_id
                WHERE community_owner = '".$user_id."' AND community_member_status = 'pending';";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        return $result_data;
    }

    public function acceptGroupRequest($member_id) {
        $sql = "UPDATE community_member SET community_member_status = 'active' WHERE community_member_id = '".$member_id."';";

        return $this->makeBoolQuery($sql);
    }

    public function declineGroupRequest($member_id) {

        $sql = "DELETE FROM community_member WHERE community_member_id = '".$member_id."';";

        return $this->makeBoolQuery($sql);

    }

    public function amIaGroupAdmin($user_id) {
        $sql = "SELECT * FROM community WHERE community_owner = '".$user_id."';";

        $count = $this->queryForEntryCount($sql);

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }


    // Sends message
    // 1. Parameter from user id
    // 2. Parameter to user id
    // 3. Parameter message
    // If the query was a success it outputs 'success'
    // If the query failed it outputs the query error

    public function send_message($from,$to,$msg){

        $message_data = array(
            'notification_from' => $from,
            'notification_to' => $to,
            'notification_message' => $msg
        );
      
        return $this->makeInsertQuery('notification',$message_data);
   
    }


    public function getUserId($user_name) {

        $sql = "SELECT user_id FROM user WHERE user_nickname = '".$user_name."';";

        $this->connect();

        $result_raw = mysqli_query($this->conn,$sql);

        $this->disconnect();

        $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

        if (isset($result_data[0])) {
            return $result_data[0]['user_id'];
        }

    }

  // gets all messages from user
  // 1. Parameter user id
  // Output messages
  public function get_messages($user_id) {

    $sql = "SELECT notification_id, notification_from, notification_message, notification_date, user_nickname, user_img FROM notification 
    JOIN user ON notification_from = user_id
    WHERE notification_to = '".$user_id."'
    ORDER BY notification_date DESC;";
      
    $this->connect();

    $result_raw = mysqli_query($this->conn,$sql);

    $this->disconnect();

    return $result_raw->fetch_all(MYSQLI_ASSOC);

  }




  // delete message
  // 1. Parameter message id
  // Output success or error
  public function delete_message($msg_id){

    $sql = "DELETE FROM notification WHERE notification_id = '".$msg_id."'";
   
    return $this->makeBoolQuery($sql);

  }

  // Gets user data
  // 1. Parameter user id
  // Output array = user data
  public function getUserData($user_id) {

    $sql = "SELECT * FROM user WHERE user_id = '".$user_id."';";

    $this->connect();

    $result_raw = mysqli_query($this->conn,$sql);

    $this->disconnect();

    $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

    return $result_data[0];

  }

  // create game
  public function creategame($game_data) {


    return $this->makeInsertQuery('games',$game_data);

  }

  public function searchUser($user_nickname) {
    $sql = "SELECT * FROM user WHERE user_nickname LIKE '%".$user_nickname."%';";

    $this->connect();

    $result_raw = mysqli_query($this->conn,$sql);

    $this->disconnect();

    $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

    return $result_data;
  }

  public function searchGroup($group_name) {
    $sql = "SELECT * FROM community WHERE community_name LIKE '%".$group_name."%' LIMIT 10;";

    $this->connect();

    $result_raw = mysqli_query($this->conn,$sql);

    $this->disconnect();

    $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

    return $result_data;
  }

  public function getGroupTags($group_id) {
    $sql = "SELECT game_tag_name as tags FROM community 
            JOIN game_connect ON game_connect.fk_community_id = community.community_id
            JOIN games ON games.game_id = game_connect.fk_game_id
            JOIN game_tag ON games.fk_game_tag_id = game_tag.game_tag_id
            WHERE game_connect.fk_community_id = '".$group_id."';";

    $this->connect();

    $result_raw = mysqli_query($this->conn,$sql);

    $this->disconnect();

    $result_data = $result_raw->fetch_all(MYSQLI_ASSOC);

    return $result_data;
  }

  public function editProfile($profile_data,$user_id) {
      return $this->makeModifyQuery('user',$profile_data,$user_id);
  }

}

class adminClass extends userClass {

    // Ban user
    // 1. Paramter user id
    // 2. Paramter until date
    // Output 'success' or error
    public function banUser($user_id,$ban_until_date) {

        $data = array(
            'fk_user_id' => $user_id,
            'banned_user_date_unbanning' => $ban_until_date
        );

        return $this->makeInsertQuery('banned_user',$data);

    }

    // Unban user
    // 1. Parameter user id from the user that should be unbanned
    // Output 'succes' or error
    public function unbanUser($user_id) {

        $sql = "DELETE FROM banned_user WHERE fk_user_id = '".$user_id."';";

        return $this->makeBoolQuery($sql);

    }

    public function deleteSupport($msg_id) {
        $sql = "DELETE FROM support_message WHERE support_message_id = '".$msg_id."';";

        return $this->makeBoolQuery($sql);
    }

}