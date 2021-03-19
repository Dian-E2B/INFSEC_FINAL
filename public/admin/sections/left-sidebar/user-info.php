<div class="user-info">
    <div class="image">
        <img src="../../public/admin/images/logo.png" width="48" height="48" alt="User" />
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?>
        </div>
        <div class="email"><?php echo $_SESSION['user']['email']; ?></div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="#"><i class="material-icons">person</i>Profile</a>
                </li>
                <li>
                    <a href="../../app/controllers/admin/logout.php">
                        <i class="material-icons">input</i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>