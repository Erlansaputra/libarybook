<?php session_start() ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div id='container'>
            <div id='menu'>
                <div id='title'>ADMIN LIBRARY</div>
                <a href="../book">Books</a>
                <a href="../user" class="active">Users</a>
                <a href="../lending-book">Lending Books</a>
            </div>
        <div id='content'>
            <table>
                <tr>
                    <td>Id</td>
                    <td>Display Name</td>
                    <td>Username</td>
                    <td>Admin</td>
                    <td style="width:4rem;">Action</td>
                </tr>
                <?php
                
                require '../dbconnection.php';

                $query = "SELECT * from users ORDER BY id ASC;";
                $result = pg_query($query) or die('Query failed: ' . pg_last_error());
                
                $arrayResult = pg_fetch_all($result);
                // echo "<pre>" . print_r($arrayResult, true) . "</pre>";

                foreach ($arrayResult as $user) {
                    $id = $user['id'];
                    $name = $user['name'];
                    $username = $user['username'];
                    $admin = $user['admin'];

                    echo
                    "<tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$username</td>
                        <td>"; 
                            echo "<div class='boolean $admin'></div>";
                        echo 
                        "</td>
                        <td>
                            <form style='display:inline-block;' action='./pre-update.php' method='post'>
                                <input type='hidden' value='$id' name='editCandidate[id]'>
                                <input type='hidden' value='$name' name='editCandidate[name]'>
                                <input type='hidden' value='$username' name='editCandidate[username]'>
                                <input type='hidden' value='$admin' name='editCandidate[admin]'>
                                <button type='submit' id='update-button'></button>
                            </form>
                            <form style='display:inline-block;' action='./delete.php' method='post'>
                                <input type='hidden' value='$id' name='id'>
                                <button  type='submit' id='delete-button'></button>
                            </form>
                        </td>
                    </tr>";
                }
                ?>
            </table>
            <form action='./show-create-dialog.php' method="post">
                <button type='submit' id='create-button'></button>
            </form>
        </div>
    </div>
    <?php
    
    $createDialogStatus = 'inactive';
    if (isset($_SESSION['isShowCreateDialog']) && $_SESSION['isShowCreateDialog'] == 'true') {
        $createDialogStatus = 'active';
    }

    $editCandidate = array(
        'id' => '',
        'name' => '',
        'username' => '',
        'admin' => '',
        'password' => ''
    );

    $dialogTitle = 'Add new User';
    $dialogAction = './create.php';
    $adminChecked = '';
    
    if (isset($_SESSION['editCandidate'])) {
        $editCandidate = $_SESSION['editCandidate'];
        echo '<pre>' . print_r($editCandidate, true) . '</pre>';
        $dialogTitle = 'Edit User';
        $dialogAction = './update.php';
    }
    
    if ($editCandidate['admin'] == 't') {
        $adminChecked = 'checked';
    }
    
    ?>
    <div id="create-dialog-container" class="<?php echo $createDialogStatus; ?>">
        <div id="create-dialog">
            <form action="<?= $dialogAction ?>" method="post" enctype="multipart/form-data">
                <h3><?= $dialogTitle ?></h3>
                <input type="hidden" name='id' value="<?= $editCandidate['id'] ?>">
                <label for="name">Display Name</label>
                <input required type="text" name="name" value="<?php echo $editCandidate['name'] ?>" >
                <label for="username">Username</label>
                <input required type="text" name="username" value="<?php echo $editCandidate['username'] ?>">
                <label  for="password">Password</label>
                <input required type="text" name="password">
                <label for="admin">Admin</label>
                <input style="margin:1rem 1rem 1.5rem 0; width:fit-content;" <?= $adminChecked ?> type="checkbox" name="admin" value="true">
                <button id="add-create-button" type="submit"><?= $dialogTitle ?></button>
            </form>
            <form action="./hide-create-dialog.php" method="post">
                <button id="cancel-create-button" type="submit">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>