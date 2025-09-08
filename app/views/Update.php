<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
     <link rel="stylesheet" href="<?=base_url();?>public/css/style2.css">
</head>
<body>
    <h1>Update Data</h1>
    <form action="<?=site_url('user/update/'.$student['id']);?>" method="post">
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" value="<?=html_escape($student['last_name']);?>"><br>
        
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" value="<?=html_escape($student['first_name']);?>"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?=html_escape($student['email']);?>"><br>
        
   
        
        <input type="submit" value="Submit">
    </form>

</body>
</html>