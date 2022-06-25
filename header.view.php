<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="height: 78px">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="
              navbar-brand-inner-wrapper
              d-flex
              justify-content-between
              align-items-center
              w-100
            ">
          <a class="navbar-brand brand-logo" href="index.php"><img src="./images/milimani.jpg" alt="logo" style="object-fit: cover; width: 50px; height: 50px" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>
      <div class="
            navbar-menu-wrapper
            d-flex
            align-items-center
            justify-content-end
          ">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face5.jpg" alt="profile" />
              <span class="nav-profile-name">Truphena</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="typcn typcn-cog-outline text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" onclick="location='login.php'">
                <i class="typcn typcn-eject text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-date dropdown">
            <a class="
                  nav-link
                  d-flex
                  justify-content-center
                  align-items-center
                " href="javascript:;">
              <!-- <h6 class="date mb-0"><?php echo date("Y"); ?></h6> -->
              <i class="typcn typcn-calendar"></i>
            </a>
          </li>
          <li class="nav-item nav-profile dropdown">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search pupil..." aria-label="search" aria-describedby="search" style="width: 400px" oninput='pupilName(event)' />
              <div class="input-group-prepend" style="cursor: pointer">
                <span class="input-group-text" id="search">
                  <i class="typcn typcn-zoom"></i>
                </span>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="
                  nav-link
                  count-indicator
                  dropdown-toggle
                  d-flex
                  justify-content-center
                  align-items-center
                " id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="typcn typcn-cog-outline mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
             
              <a class="dropdown-item" onclick="location='login.php'">
                <i class="typcn typcn-eject text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="
              navbar-toggler navbar-toggler-right
              d-lg-none
              align-self-center
            " type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>