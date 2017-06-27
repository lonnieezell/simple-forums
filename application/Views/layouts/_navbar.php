<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Some Forums</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?= route_to('categoryPage') ?>">Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= route_to('recentPostsPage') ?>">Recent</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= route_to('userListPage') ?>">User</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= route_to('login') ?>">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= route_to('register') ?>">Register</a></li>
        </ul>

    </div>
</nav>