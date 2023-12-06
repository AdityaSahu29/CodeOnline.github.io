<body>
    <nav class="navbar navbar-expand-md green-bg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">codeOnline<span class="blink">_</span></a>
        </div>
        <ul class="navbar-nav ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tutorials</a>
                <ul class="dropdown-menu">
                    <?php 
                        //  3.perform databse query
                        $sql1 = "SELECT * FROM `languages`"; 
                        $res1 = mysqli_query($connection,$sql1);
                        // 4. return the data from database
                        while($row1 = mysqli_fetch_array($res1)){
                            echo '<li><a class="dropdown-item" href="tutorial.php?lang='.$row1["lang_id"].'">'.strtoupper($row1["lang_name"]).'</a></li>';
                        }
                    ?>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Compiler</a>
                <ul class="dropdown-menu">
                    <?php 
                        //  3.perform databse query
                        $sql1 = "SELECT * FROM `languages`"; 
                        $res1 = mysqli_query($connection,$sql1);
                        // 4. return the data from database
                        while($row1 = mysqli_fetch_array($res1)){
                            echo '<li><a class="dropdown-item" href="editor.php?lang='.$row1["lang_id"].'">'.strtoupper($row1["lang_name"]).'</a></li>';
                        }
                    ?>
                </ul>
            </li>
            <li class="nav-item">
                <?php
                    if(isset($_SESSION['u_id'])){
                    // echo('<a class="nav-link" href="account.php">My Account</a>');
                    echo('<a class="nav-link" href="logout.php">logout</a>');
                    }
                    else{
                      echo('<a class="nav-link" href="login.php">Login</a>'); 
                    }
                ?>
            </li>
        </ul>
    </nav>