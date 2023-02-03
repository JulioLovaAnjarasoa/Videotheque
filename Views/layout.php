<?php


require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Views/scripts.php';
// require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Controllers/videoController.php';

class Layout
{
    public function index($datas)
    {
        $this->left_side($datas);
    }
    public function left_side($datas)
    {
        get_header();
?>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <?php
                            foreach ($datas as $data) {
                            ?>
                                <li class="nav-item">
                                    <a href="?genre=<?php echo $data->id; ?>" class="nav-link align-middle px-0">
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"><?php echo $data->name; ?></span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
<?php
        get_footer();
    }
}
