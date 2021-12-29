<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        h2 {
            margin-top: 25px;
            margin-bottom: 0.5rem;
            font-weight: bolder;
            line-height: 1.2;
            padding-left: 120px;
        }
    </style>
</head> 
<body>

    <nav class="navbar navbar-dark bg-dark" style="margin-top: 3px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="" style="padding-left: 100px ; font-weight: bolder; "> Curd Application </a>
        </div>
    </nav>

    <h2 >Login Student Data</h2>
    <hr>
    
    <form class="form-signin" method="POST" name="loginStudent" action="<?php echo base_url() . "index.php/student/login";  ?>">
      <div class="container" >
      <?php

            $msg = $this->session->flashdata('msg');
                if($msg !=''){
     
        ?>
        <div class="alert alert-danger" >
            <?php echo $msg; ?>

        </div>
        <?php 
                }
        ?>
</div>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div>
                        <label style="font-weight: 700 ;">Email</label>
                        <input type="email" class="form-control"<?php echo (form_error( field: 'Email') != "" )? 'is-invilid': ""; ?> name="Email" value="<?php echo set_value('Email'); ?>" placeholder="Enter Email"  >
                        <p class="invilid-feedback"><?php echo strip_tags(form_error(field: 'Email')) ; ?></p>
                    </div>

                    <div>
                        <label style="font-weight: 700 ;">Password</label>
                        <input type="password" class="form-control"<?php echo (form_error( field: 'pword') != "" )? 'is-invilid': ""; ?> name="pword"  placeholder="password" >
                        <p class="invilid-feedback"><?php echo strip_tags(form_error(field: 'pword')) ; ?></p>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit" >Sign in</button>
                        <a style="font-weight : bold"  href="<?php echo base_url().'index.php/student/register' ?>">Register Here.</a>
                    </div>
    
                </div>
            </div>
        </div>
    </form>
</body>


</html>