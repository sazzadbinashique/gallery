<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin Page
                <small>Subheading</small>
            </h1>

             <?php 
               /* $sql = "SELECT * FROM users WHERE id =1";
                $result = $database->query($sql);
                $user_found = mysqli_fetch_array($result);
                // $database->confirm_query($user_found);

                echo $user_found['username'];
                echo $user_found['password'];
                echo $user_found['firstname'];
                echo $user_found['lastname'];
                echo $user_found['date'];
              
                $user = new User();
                $result_set=$user->find_all_users();*/
            /*
             $result_set=User::find_all_users();
             while ($row = mysqli_fetch_array($result_set)) {
                 echo $row['username']. "<br>";
             }*/

                // $result = User::find_user_by_id(2);
                // $user = User::instantation($result);

                /*$user = new User(); 

                $user->id = $result['id'];              
                $user->username = $result['username'];              
                $user->password = $result['password'];              
                $user->firstname = $result['firstname'];              
                $user->lastname = $result['lastname'];              
                $user->date = $result['date']; */ 
                // echo $user->firstname . " " . $user->lastname;  


                /*$result = User::find_all_users();
                while ($row = mysqli_fetch_array($result)) {
                        echo $row['username'] . "<br>"; 
                    }    */

                // $results = User::find_all_users();
                // foreach ($results as $result) {
                //     echo $result->id . "<br>";
                // }

                    $found_user = User::find_user_by_id(2);

                    echo $found_user->username;



              ?>   




            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Admin Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
