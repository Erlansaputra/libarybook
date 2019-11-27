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
                <a href="./book.php" class="active">Books</a>
                <a href="">Users</a>
                <a href="">Lending Books</a>
            </div>
        <div id='content'>
            <table>
                <tr>
                    <td>Id</td>
                    <td>Image</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Author</td>
                    <td>Publication Year</td>
                    <td style="width:4rem;">Action</td>
                </tr>
                <?php
                
                require '../dbconnection.php';

                $query = "SELECT * from books;";
                $result = pg_query($query) or die('Query failed: ' . pg_last_error());
                
                $arrayResult = pg_fetch_all($result);
                // echo "<pre>" . print_r($arrayResult, true) . "</pre>";

                foreach ($arrayResult as $book) {
                    $id = $book['id'];
                    $image_name = $book['image_name'];
                    $title = $book['title'];
                    $description = $book['description'];
                    $author = $book['author'];
                    $publication_year = $book['publication_year'];

                    echo
                    "<tr>
                        <td>$id</td>
                        <td><img width='100px' src='/../uploaded/images/$image_name' alt='image'></td>
                        <td>$title</td>
                        <td>$description</td>
                        <td>$author</td>
                        <td>$publication_year</td>
                        <td>
                            <form style='display:inline-block;' action='./pre-update.php' method='post'>
                                <input type='hidden' value='$id' name='editCandidate[id]'>
                                <input type='hidden' value='$image_name' name='editCandidate[image_name]'>
                                <input type='hidden' value='$title' name='editCandidate[title]'>
                                <input type='hidden' value='$description' name='editCandidate[description]'>
                                <input type='hidden' value='$author' name='editCandidate[author]'>
                                <input type='hidden' value='$publication_year' name='editCandidate[publication_year]'>
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
        'title' => '',
        'description' => '',
        'author' => '',
        'publication_year' => '',
        'image_name' => ''
    );

    $dialogTitle = 'Add new Book';
    $dialogAction = './create.php';

    if (isset($_SESSION['editCandidate'])) {
        $editCandidate = $_SESSION['editCandidate'];
        echo '<pre>' . print_r($editCandidate, true) . '</pre>';
        $dialogTitle = 'Edit Book';
        $dialogAction = './update.php';
    }
    
    ?>
    <div id="create-dialog-container" class="<?php echo $createDialogStatus; ?>">
        <div id="create-dialog">
            <form action="<?= $dialogAction ?>" method="post" enctype="multipart/form-data">
                <h3><?= $dialogTitle ?></h3>
                <input type="hidden" name='id' value="<?= $editCandidate['id'] ?>">
                <label for="title">Title</label>
                <input required type="text" name="title" value="<?php echo $editCandidate['title'] ?>" >
                <label for="description">Description</label>
                <input type="text" name="description" value="<?php echo $editCandidate['description'] ?>">
                <label for="author">Author</label>
                <input type="text" name="author" value="<?php echo $editCandidate['author'] ?>">
                <label for="publication_year">Publication Year</label>
                <input type="number" name="publication_year" value="<?= $editCandidate['publication_year'] ?>">
                <label for="image">Image</label>
                <input type="file" name="image">
                <button id="add-create-button" type="submit"><?= $dialogTitle ?></button>
            </form>
            <form action="./hide-create-dialog.php" method="post">
                <button id="cancel-create-button" type="submit">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>