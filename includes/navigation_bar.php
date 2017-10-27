<div class="nav_body">
    <header class="nav_header bg-dark">
        <div class="nav_container">
            <a href="index.php">
                <img src="img/logorandom.png" alt="logo" class="logo">
            </a>
            <nav>
                <ul class="nav_ul">
                    <a href="index.php"><li>Home</li></a>
                    <?php
                        session_start();
                        if (isset($_SESSION["currentUser"])) {
                            // si hay sesión iniciada mostramos enlace al perfil
                            $name = $_SESSION["currentUser"];
                            echo("<a href='profile.php'><li>$name</li></a>");
                        } else {
                            // si no, mostramos enlace al login y al signup
                            echo("<a href='formulario_login.php'><li>Login</li></a>");
                            echo("<a href='formulario_registro.php'><li>Sign up</li></a>");
                        }
                     ?>
                    <a href="formulario_post.php"><li>Submit Snippet!</li></a>
                </ul>
                <form id="nav_search" class="form-inline">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button  class="btn btn-info" type="submit">Search</button>
                </form>
            </nav>
        </div>
    </header>
</div>
