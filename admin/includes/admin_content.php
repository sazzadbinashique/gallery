<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin Page
                <small>Subheading</small>
            </h1>

             <?php 

             $user = new User();

             $user->username = "nilangona";
             $user->password = "iloveyou";
             $user->firstname = "Sazzad Bin";
             $user->lastname = "Ashique";
             // $user->date = '2019-03-09';

             $user->create();




             // $user = User::find_user_by_id(60);
             // $user->username = "abbasali";
             // $user->password = "12345";
             // $user->firstname = "Suzon";
             // $user->lastname = "Ahmed";
             // // $user->date     = '2019-03-09';
             // $user->update();


             // $user = User::find_user_by_id(61);
             // $user->delete();


              // $user = User::find_user_by_id(60);
              // $user->username = "sumilove";
              // $user->password = "mylove";
              // $user->firstname = "Siala";
              // $user->lastname = "Shams Sumi";
              // $user->save();


             // $user = new User();
             // $user->username="sumasumi";
             // $user->password = "loveisnotgood";
             // $user->save();



    
             // echo "<pre>";
             // print_r($user);
             // echo "<pre>";
   

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
