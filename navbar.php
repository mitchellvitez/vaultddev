<?php session_start();
  if ($_SESSION['logged_in'] == true) { ?>
<nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
            </div>
            <div id="navbar">
                <ul class="nav navbar-nav">
                    <?php if ($_SERVER["REQUEST_URI"] != "/") { ?>
                        <li><a href="//vaultdstorage.com" onclick="window.location.href = $(this).attr('href')">Home</a></li>
                    <?php } ?>
                    <li><a href="mailto:info@vaultdstorage.com">Email us</a></li>
                    <?php if ($_SERVER["REQUEST_URI"] != "/faq") { ?>
                        <li><a href="faq" onclick="window.location.href = $(this).attr('href')">FAQ</a></li>
                    <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-left: 30px;">
                    <li><a href="profile">Profile</a>
                    </li>
                    <li><a href="boxes">My Storage</a>
                    </li>
                    <li><a href="order">Order</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php } else { ?>
<nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
            </div>
            <div id="navbar">
                <ul class="nav navbar-nav">
                <?php if ($_SERVER["REQUEST_URI"] != "/") { ?>
                    <li><a href="//vaultdstorage.com" onclick="window.location.href = $(this).attr('href')">Home</a></li>
                <?php } ?>
                    <li><a href="mailto:info@vaultdstorage.com" >Email us</a></li>
                <?php if ($_SERVER["REQUEST_URI"] != "/faq") { ?>
                    <li><a href="faq" onclick="window.location.href = $(this).attr('href')">FAQ</a></li>
                <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-left: 30px;">
                    <li><a href="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php } ?>