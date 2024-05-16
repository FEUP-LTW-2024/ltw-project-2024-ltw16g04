<?php
  declare(strict_types=1);

 

  
  function drawUserList() {
    require_once(__DIR__ . '/../utils/session.php');

    require_once(__DIR__ .'/../data/connection.php');
    require_once(__DIR__ .'/../data/user.php');
    $session = new Session();
    $db = getDatabaseConnection(); 
    $users = User::getAllUsers($db);

    

    ?>
    
    <section class="orders">
    <?php if(!$users){
            echo '<p>No Users yet</p>';
            ?>
            </section>
            <?php
    }
    else {

    foreach ($users as $user){
        $user_id = $user['id'];
        $user_name = $user['name'];
        $user_email = $user['email'];
        $delete_btn_id = 'delete_btn_' . $user['id'];
        $edit_button_id = 'edit_btn_' . $user['id'];


    ?>

    <div class="user_container">
        <table class="order_table">
            <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            <tr>
                <td>#<?php echo $user_id;?></td>
                <td><?php echo $user_name;?></td>
                <td><?php echo $user_email;?></td>
                <?php if(User::isAdmin($user_id,$db)){?>
                    <td>Admin</td>
                <?php } else { ?>
                    <td>User</td>
                <?php } ?>
            </tr>
        </table>
        <div class="buttons">
            <button id="<?php echo $edit_button_id;?>" class="elevatebtn">Elevate to Admin</button>
            <script type="text/javascript">
              document.getElementById("<?php echo $edit_button_id;?>").onclick = function () {
              location.href = "../actions/elevate_user_action.php?id=<?php echo $user_id;?>";
            };
            </script>
            <button id="<?php echo $delete_btn_id;?>" class = "deletebtn">Delete User</button>
            <script type="text/javascript">
              document.getElementById("<?php echo $delete_btn_id;?>").onclick = function () {
              location.href = "../actions/delete_user_action.php?id=<?php echo $user_id;?>";
            };
            </script>
            
        </div>
    </div>

        </a>
    <?php
        }  
        ?>
        </section>
        <?php
    }
}
?>
