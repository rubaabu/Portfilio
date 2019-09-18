<?php 

require '../db.php';

if($_GET['id'])
    $id = $_GET['id'];

        $sql = "SELECT request_status FROM requests WHERE request_id = {$id}";
        
        $result = mysqli_query($conn,$sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
     $data = fetch_assoc($result);
     $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../header.php'; ?>
    <title>Acept Requests</title>
</head>
<body>
    <form action="a_acceptRequest.php" method="post">
        <table>
           
            <tr>
               <th>Status:</th >
               <td>
                <label for="request_status" value =" <?php echo $data['request_status'];?>">Open</label>
               <input  type="radio" name="request_status"  value="buy"  /><br >

               <label for="type">Accept</label>
               <input  type="radio" name="request_status"  value="Accepted"  /><br >

               <label for="type">Dimiss</label>
               <input  type="radio" name="request_status"  value="Dismissed"  /><br >
              
               
               </td>
            </tr >
            <tr>
               <input type= "hidden" name= "request_id" value= "<?php echo $data['request_id']; ?>" />
               <td><button  type= "submit">Save Changes</button ></td>
               <td><a  href= "directorpage.php"><button  type="button" >Back</button ></a ></td >
           </tr>
        </table>
    </form>
        
</body>
</html>