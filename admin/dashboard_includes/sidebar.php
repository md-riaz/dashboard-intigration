
<style>
    .dropdown-toggle:after {
        position: absolute;
        top: 50%;
        right: 50%;
    }

    .ppimg {
        height: 70px;
        border-radius: 50%;
        width: 70px;
        object-fit: cover;
        margin: 0 10px 0 0;
    }

    .dropdown-toggle:after {
        right: 40%;
    }
</style>

<div class="sidebar" data-color="purple" data-background-color="white">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            <img class="ppimg" src="/admin/dashboard_assets/user_img/<?= $_SESSION["img_dir"] ?>" alt=""> <?= $_SESSION["names"] ?>
        </a>
        <div class="text-center"><?= role($_SESSION["role"]) ?></div>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/admin/auth/dashboard.php">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p>Users</p>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/all_users.php"><i class="material-icons"> group </i>all users</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/admin/auth/register.php"><i class="material-icons"> person_add </i>add new</a>
                    </div>
                </div>
            </li>
            <li class="nav-item ">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">title</i>
                        <p>Header</p>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/header_section/add-header.php"><i class="far fa-comment-alt-plus"></i>Add header info</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/admin/header_section/all-header.php"><i class="fas fa-sitemap"></i>View Header info</a>
                    </div>
                </div>
            </li>
            <li class="nav-item ">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">work_outline</i>
                        <p>Service</p>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/services/add-service.php"><i class="material-icons"> work </i>Add Service</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/admin/services/all-service.php"><i class="material-icons"> view_list </i>View Service</a>
                    </div>
                </div>
            </li>
            <li class="nav-item ">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">group_work</i>
                        <p>Fact Area</p>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/fact_area_section/add-fact.php"><i class="material-icons"> playlist_add </i>Add Fact</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/admin/fact_area_section/all-fact.php"><i class="material-icons"> list_alt </i>View ALL</a>
                    </div>
                </div>
            </li>
            <li class="nav-item ">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">message</i>
                        <p>Messages</p>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/messages/all-messages.php"><i class="material-icons"> textsms
                            </i>All Messages</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/admin/messages/msg-trash.php"><i class="material-icons"> delete_sweep </i>Trash Messages</a>
                    </div>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/admin/about_section/about.php">
                    <i class="material-icons">short_text</i>
                    <p>About Section</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/admin/logo/logo.php">
                    <i class="material-icons">collections</i>
                    <p>Site Logo</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/admin/address/address.php">
                    <i class="material-icons">edit_location</i>
                    <p>Address</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/admin/portfolio/portfolio.php">
                    <i class="material-icons">thumbs_up_down</i>
                    <p>Best Works</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/brands/brands.php">
                    <i class="material-icons">card_giftcard</i>
                    <p>Brand Logo's</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/testimonial/testimonial.php">
                    <i class="material-icons">speaker_notes</i>
                    <p>Testimonials</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/copyright/">
                    <i class="material-icons">copyright</i>
                    <p>Copyright Section</p>
                </a>
            </li>
        </ul>
    </div>
</div>