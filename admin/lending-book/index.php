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
                <a href="../user">Users</a>
                <a href="../lending-book" class="active">Lending Books</a>
            </div>
        <div id='content'>
            <table>
                <tr>
                    <td>Id</td>
                    <td>Returned</td>
                    <td>User Id</td>
                    <td>Username</td>
                    <td>Book Id</td>
                    <td>Book Title</td>
                    <td>Book Image</td>
                    <td style="width:4rem;">Action</td>
                </tr>
                <?php
                
                require '../dbconnection.php';

                $query = "SELECT
                lending.id as id,
                lending.returned as returned,
                users.id as user_id,
                users.username as username,
                books.id as book_id,
                books.title as book_title,
                books.image_name as book_image_name
                from lending
                left join users on lending.user_id = users.id
                left join books on lending.book_id = books.id
                ORDER BY id ASC;";
                $result = pg_query($query) or die('Query failed: ' . pg_last_error());
                
                $arrayResult = pg_fetch_all($result);
                // echo "<pre>" . print_r($arrayResult, true) . "</pre>";

                foreach ($arrayResult as $lending) {
                    $id = $lending['id'];
                    $returned = $lending['returned'];
                    $user_id = $lending['user_id'];
                    $username = $lending['username'];
                    $book_id = $lending['book_id'];
                    $book_title = $lending['book_title'];
                    $book_image_name = $lending['book_image_name'];

                    echo
                    "<tr>
                        <td>$id</td>
                        <td>"; 
                            echo "<div class='boolean $returned'></div>";
                        echo 
                        "</td>
                        <td>$user_id</td>
                        <td>$username</td>
                        <td>$book_id</td>
                        <td>$book_title</td>
                        <td><img width='100px' src='/../uploaded/images/$book_image_name'></td>
                        <td>
                            <form style='display:inline-block;' action='./pre-update.php' method='post'>
                                <input type='hidden' value='$id' name='editCandidate[id]'>
                                <input type='hidden' value='$returned' name='editCandidate[returned]'>
                                <input type='hidden' value='$user_id' name='editCandidate[user_id]'>
                                <input type='hidden' value='$book_id' name='editCandidate[book_id]'>
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
        'user_id' => '',
        'book_id' => '',
        'returned' => ''
    );

    $dialogTitle = 'Add new Lending';
    $dialogAction = './create.php';
    $returnedChecked = '';

    if (isset($_SESSION['editCandidate'])) {
        $editCandidate = $_SESSION['editCandidate'];
        echo '<pre>' . print_r($editCandidate, true) . '</pre>';
        $dialogTitle = 'Edit Lending';
        $dialogAction = './update.php';
    }

    if ($editCandidate['returned'] == 't') {
        $returnedChecked = 'checked';
    }
    
    ?>
    <div id="create-dialog-container" class="<?php echo $createDialogStatus; ?>">
        <div id="create-dialog">
            <form action="<?= $dialogAction ?>" method="post" enctype="multipart/form-data">
                <h3><?= $dialogTitle ?></h3>
                <input type="hidden" name='id' value="<?= $editCandidate['id'] ?>">
                <label for="name">User Id</label>
                <input required type="number" name="user_id" value="<?php echo $editCandidate['user_id'] ?>" >
                <label for="username">Book Id</label>
                <input required type="number" name="book_id" value="<?php echo $editCandidate['book_id'] ?>">
                <label for="returned">Returned</label>
                <input style="margin:1rem 1rem 1.5rem 0; width:fit-content;" <?= $returnedChecked ?> type="checkbox" name="returned" value="true">
                <button id="add-create-button" type="submit"><?= $dialogTitle ?></button>
            </form>
            <form action="./hide-create-dialog.php" method="post">
                <button id="cancel-create-button" type="submit">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>