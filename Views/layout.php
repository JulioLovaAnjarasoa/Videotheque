<?php

class Layout
{
    public function index($datas)
    {
        $this->get_header();
        $this->main_page($datas);
        $this->get_footer();
    }
    public function get_header()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <title>Document</title>
        </head>

        <body>
        <?php
    }

    public function get_footer()
    {
        ?>
        </body>

        </html>
    <?php
    }

    public function main_page($datas)
    {
    ?>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <?php
                            foreach ($datas['types'] as $type) {
                            ?><li class="nav-item">
                                    <a href="?genre=<?php echo $type->id; ?>&type=<?php echo $type->name ?>" class="nav-link align-middle px-0">
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"><?php echo $type->name; ?></span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <hr>
                    </div>
                </div>
                <div class="col py-3">
                    <?php
                    if ($datas['popular_movies']) {
                    ?>
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Top rated movies</h1>
                                <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
                                <div class="row">
                                    <?php
                                    $movies = $datas['popular_movies'];
                                    $i = 0;
                                    while ($i < 6) {
                                    ?>
                                        <div class="col-2 card">
                                            <a href=""><img src="https://image.tmdb.org/t/p/original/<?php echo $movies[$i]->poster_path ?>" class="img-fluid rounded-start" alt="..."></a>

                                        </div>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="row">
                        </br>
                        </br>
                        <h1><?php echo $datas['type']; ?> Movies</h1>
                        <?php
                        foreach ($datas['movies'] as $movie) {
                        ?>
                            <div class="col-2 card">
                                <div class="">
                                    <a href=""><img src="https://image.tmdb.org/t/p/original/<?php echo $movie->poster_path ?>" class="img-fluid rounded-start" alt="..."></a>
                                </div>
                                <div class="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $movie->original_title; ?></h5>
                                        <p class="card-text"><small class="text-muted"></small></p>
                                        <p class="card-text"><?php echo $movie->overview; ?></p>

                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php

                ?>
            </div>
        </div>
    <?php
    }

    public function login_or_register()
    {
        $this->get_header();
    ?>
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card px-5 py-5" id="form1">
                        <div class="form-data">
                            <form action="" method="POST">
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">E-Mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword" name="inputPassword">
                                    </div>
                                </div>
                                <div class="mb-3"> <button v-on:click.stop.prevent="submit" class="btn btn-dark w-100">Login</button> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        $this->get_footer();
    }
}
