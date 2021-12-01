<nav class="navbar navbar-expand-xl bg-dark navbar-dark py-0 fixed-top" id="navbar">
    <div class="container-fluid" id="header">
        <a href="../home.php" class="navbar-brand fs-1">GETFLIX</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-6 mb-lg-auto m-lg-6">
                <li class="nav-itembar1 p-2 link-menu ">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item p-2 link-menu ">
                    <a class="nav-link" href="allmovies.php">Movies</a>
                </li>
                <li class="nav-item p-2 link-menu ">
                    <a class="nav-link" href="series.php">Series</a>
                </li>
                <li class="nav-item p-2 link-menu ">
                    <a class="nav-link" href="#">New content</a>
                </li>
                <li class="nav-item py-2 link-menu ">
                    <a class="nav-link" href="#">My list</a>
                </li>
            </ul>
            <form class="d-flex" id="search" method="post" action="search.php">
                <input class="form-control me-2" type="search" placeholder="Movies, series or people" aria-label="Search" name="search" style="width: 250px;">
                <button class="btn btn-light" type="submit">Search</button>
            </form>
            <div class="dropdown" id="account">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['LOGGED_USER']; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="../profile.php">Edit profil</a></li>
                    <li><a class="dropdown-item" style="color:red;" href="../logout.php">Disconnect</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
