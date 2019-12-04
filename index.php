<?php 
    session_start();  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <!--My CSS-->
    <style>
      section {
        min-height: 420px;
      }
    </style>

    <title>Hello, world!</title>
  </head>
  <body class="mt-5">
    <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success">
      <div class="container">
      <?php
      if (!isset($_SESSION['has-login'])) {
      header('Location:login');
      }
?>

        <a class="navbar-brand" href="#">Library book</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
            <a class="nav-item nav-link" href="#">About</a>
            <a class="nav-item nav-link" href="#">Books</a>
            <a class="nav-item nav-link" href="login/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>

    <!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid bg-light">
      <div class="container text-center mb-5 mt-5">
        <img src="image/book.png" width="25%" />
        <h1 class="display-4">Library Book</h1>
        <p class="lead">
          Welcome to our book library
        </p>
      </div>
    </div>

    <!--About-->
    <section id="about" class="about">
      <div class="container mt-5 mb-5">
        <div class="row">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <p>
              If you are unable to endure the fatigue of learning then you must
              be able to withstand the pain of ignorance<br />
              <small>Imam Syafi'i</small>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!--Books-->
    <section class="books bg-light pb-4" id="books">
      <div class="container mt-5 mb-5">
        <div class="row">
          <div class="col text-center mt-5 mb-5">
            <h2>Books</h2>
          </div>
        </div>
        <div class='row mb-4 text-center'>

        <?php 
    
    require 'db.php';

                $query = "SELECT * from books ORDER BY id ASC;";
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
                    echo "
                    <div class='col-3'>
                    <div class='card'>
                    <img src='image/$image_name' class='card-img-top' alt='...' />
                    <div class='card-body'>
                    <h5 class='card-title'>$title</h5>
                    <p class='card-text'>
                    Author : $author<br>
                    Year Publication: $publication_year
                    </p>
                    
              
      
                    <!-- Button trigger modal -->
                    <button
                      type='button'
                      class='btn btn-primary'
                      data-toggle='modal'
                      data-target='#exampleModalCenter'
                    >
                      Details Books 
                    </button>

                  <!-- Modal -->
                  <div
                    class='modal fade'
                    id='exampleModalCenter'
                    tabindex='-1'
                    role='dialog'
                    aria-labelledby='exampleModalCenterTitle'
                    aria-hidden='true'
                  >
                    <div class='modal-dialog modal-dialog-centered' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id='exampleModalCenterTitle'>Description</h5>
                          <button
                            type='button' 
                            class='close'
                            data-dismiss='modal'
                            aria-label='Close'
                          >
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <div class='modal-body'>
                          $description
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-dismiss='modal'>
                            Close
                          </button>
                          <button type='button' class='btn btn-primary'>borrow it</button>
                          <button type='button' class='btn btn-primary'>give it back</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                    </div>
                    </div>

                    ";
                }
              ?>
    

        <!-- <div class="row mb-4 text-center">
          <div class="col">
            <div class="card">
              <img src="img/thumbs/1.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Description book
                </p>
                <a href="#" class="btn btn-success">Detail Books</a>
              </div>
            </div>
          </div> -->
          <!-- <div class="col">
            <div class="card">
              <img src="img/thumbs/2.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Description book
                </p>
                <a href="#" class="btn btn-success">Detail Books</a>
              </div>
            </div>
          </div> -->
          <!-- <div class="col">
            <div class="card">
              <img src="img/thumbs/3.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Description book
                </p>
                <a href="#" class="btn btn-success">Detail Books</a>
              </div>
            </div>
          </div> -->
          <!-- <div class="col">
            <div class="card">
              <img src="img/thumbs/3.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Description book
                </p>
                <a href="#" class="btn btn-success">Detail Books</a>
              </div>
            </div>
          </div>
        </div> -->
        <!-- <div class="row mb-4 text-center">
          <div class="col">
            <div class="card">
              <img src="img/thumbs/4.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Description book
                </p>
                <a href="#" class="btn btn-success">Detail Books</a>
              </div>
            </div>
          </div> -->
          <!-- <div class="col">
            <div class="card">
              <img src="img/thumbs/5.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Description book
                </p>
                <a href="#" class="btn btn-success">Detail Books</a>
              </div>
            </div>
          </div> -->
          <!-- <div class="col">
            <div class="card">
              <img src="img/thumbs/4.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Description book
                </p>
                <a href="#" class="btn btn-success">Detail Books</a>
              </div>
            </div>
          </div> -->
          <!-- <div class="col">
            <div class="card">
              <img src="img/thumbs/6.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Description book
                </p>
                <a href="#" class="btn btn-success">Detail Books</a>
              </div>
            </div>
          </div>
        </div> -->
        </div>
    </section>

    <!--Contact-->
    <section id="contact" class="contact mt-5 mb-5">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact Us</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card text-white bg-success mb-3 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Us</h5>
                <p class="card-text">
                  Library Books
                </p>
              </div>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><h1>Location</h1></li>
              <li class="list-group-item">Yayasan Al Furqon</li>
              <li class="list-group-item">Jl Mungkid</li>
              <li class="list-group-item">Central Java, Indonesia</li>
            </ul>
          </div>
          <div class="col-lg-6">
            <form>
              <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" class="form-control" id="nama" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" />
              </div>
              <div class="form-group">
                <label for="telp">Telp</label>
                <input type="number" class="form-control" id="telp" />
              </div>
              <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea
                  name="pesan"
                  id="pesan"
                  class="form-control"
                ></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success">
                  Kirim Pesan!
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-success text-white">
      <div class="container">
        <div class="row pt-3 pb-3">
          <div class="col text-center">
            Copyright 2019.
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
