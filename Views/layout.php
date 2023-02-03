<?php


// require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Views/scripts.php';
// require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Controllers/videoController.php';

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
                                    <a href="?genre=<?php echo $type->id; ?>" class="nav-link align-middle px-0">
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
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Top rated movies</h1>
                            <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
                            <div class="row">
                                <?php
                                foreach ($datas['popular_movies'] as $movie) {
                                ?>
                                    <div class="col-2 card">
                                        <a href=""><img src="https://image.tmdb.org/t/p/original/<?php echo $movie->poster_path ?>" class="img-fluid rounded-start" alt="..."></a>

                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <h1>Discover Movies</h1>
                        <?php
                        foreach ($datas['movies'] as $movie) {
                        ?>
                            <div class="col-4 card mb-2">
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
}
