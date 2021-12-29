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
        
            <div class="container">
                <a class="navbar-brand" href="#" style=" font-weight: bolder; "> Curd Application </a>
                
                <!-- <a class="col-md-2" href="#">Add</a>
                <a class="col-md-2" href="#" >Delete</a> -->

            </div>

    </nav>
    <h2>Registration</h2>
    <hr>
    <div class="container" >
    <?php
    $msg = $this->session->flashdata('msg1');
    if ($msg != "") {
    ?>
        <div class="alert alert-success">
            <?php echo $msg; ?>
        </div>
    <?php } ?>
    </div>
    <form method="POST" name="registerStudent" action="<?php echo base_url() . "index.php/student/register";  ?>">

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div>
                        <label style="font-weight: 700 ;">Name</label>
                        <input type="text" class="form-control" name="full_name" value="<?php echo set_value('full_name'); ?>" placeholder="Enter Name">
                        <?php echo form_error('full_name'); ?>
                    </div>
                    <div>
                        <label style="font-weight: 700 ;">Email</label>
                        <input type="email" class="form-control" name="Email" value="<?php echo set_value('Email'); ?>" placeholder="@example.com">
                        <?php echo form_error('Email'); ?>
                    </div>
                    <div>
                        <label style="font-weight: 700 ;">Password</label>
                        <input type="password" class="form-control" name="pword" value="<?php echo set_value('pword'); ?>" placeholder=" Password">
                        <?php echo form_error('pword'); ?>
                    </div>
                    <div>
                        <button class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url() . 'index.php/student/login'  ?>" class="btn btn-secondary "> Cancel </a>
                    </div>
                </div>
            </div>
        </div>

    </form>

</body>

</html>