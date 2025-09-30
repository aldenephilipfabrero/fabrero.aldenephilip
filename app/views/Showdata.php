<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showdata</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/style.css">
</head>
<body>
    <div class="main-container">
        <h1>Welcome to My Data</h1>
        <div class="button-container">
            <a href="<?=site_url('user/create');?>" class="create-btn">Create Record</a>
             <form action="<?=site_url('/');?>" method="get" class="col-sm-4 float-end d-flex">
		<?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>
	</form>
        </div>
        <div class="table-section">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php foreach(html_escape($students) as $student): ?>
                <tr>
                    <td><?=$student['id'];?></td>
                    <td><?=$student['last_name'];?></td>
                    <td><?=$student['first_name'];?></td>
                    <td><?=$student['email'];?></td>
                    <td>
                        <a href="<?=site_url('user/update/'.$student['id']);?>">Update</a>
                        <a href="<?=site_url('user/delete/'.$student['id']);?>">Delete</a>
                        <?php if (!empty($student['deleted_at'])): ?>
                            <a href="<?=site_url('user/restore/'.$student['id']);?>" class="restore-btn">Restore</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php
        echo $page;?>
    </div>
</body>
</html>