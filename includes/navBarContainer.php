<div id="navBarContainer">
    <nav class="navBar"> 
        <span  role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
            <img src="assets/images/icons/icon.png" alt="icon">
        </span>
        <div class="group">
           <div class="navItem">
                <span  role='link' tabindex='0' onclick='openPage("search.php")'class="navItemLink" >
                    <img src="assets/images/icons/search.png" class="icon" alt="Search">
                </span>
            </div>         
            <div class="group">
                <div class="navItem">
                <span  role="link" tabindex="0" onclick="openPage('browse.php')"class="navItemLink">Browser</span></div>
                </div>
                <div class="navItem">
                <span  role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your Music</span></div>
                </div>
                <div class="navItem">
                <span  role="link" tabindex="0" onclick="openPage('settings.php')"class="navItemLink"><?php echo $userLoggedIn->getUsername() ?></span></div>
                </div>
            </div>              
    </nav>
</div>