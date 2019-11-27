<?php session_start() ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="book.css">
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
                    $title = $book['title'];
                    $description = $book['description'];
                    $author = $book['author'];
                    $publication_year = $book['publication_year'];

                    echo
                    "<tr>
                        <td>$id</td>
                        <td></td>
                        <td>$title</td>
                        <td>$description</td>
                        <td>$author</td>
                        <td>$publication_year</td>
                        <td>
                            <a id='update-button'></a>
                            <a id='delete-button'></a>
                        </td>
                    </tr>";
                }

                ?>
                <tr>
                    <td>1</td>
                    <td><img width="100px" src="/../uploaded/images/persiapan-pulang-kampung.png" alt="" srcset=""></td>
                    <td>Beyond the Inspiration</td>
                    <td>Buku islami masa kini</td>
                    <td>Felix Y Siaw</td>
                    <td>2018</td>
                    <td>
                        <a id='update-button'></a>
                        <a id='delete-button'></a>
                    </td>
                </tr>
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
    
    ?>
    <div id="create-dialog-container" class="<?php echo $createDialogStatus; ?>">
        <div id="create-dialog">
            <form action="./create.php" method="post" enctype="multipart/form-data">
                <h3>Add New Book</h3>
                <label for="title">Title</label>
                <input required type="text" name="title">
                <label for="description">Description</label>
                <input type="text" name="description">
                <label for="author">Author</label>
                <input type="text" name="author">
                <label for="publication_year">Publication Year</label>
                <input type="number" name="publication_year">
                <label for="image">Image</label>
                <input type="file" name="image">
                <button id="add-create-button" type="submit">Add</button>
            </form>
            <form action="./hide-create-dialog.php" method="post">
                <button id="cancel-create-button" type="submit">Cancel</button>
            </form>
        </div>
    </div>
    
</body>
</html>