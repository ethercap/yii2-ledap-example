<div id="header">
  <b-nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button @click="toggleSideBar" class="btn btn-link rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
      <b-nav-item-dropdown class="no-arrow mx-1" right>
        <template v-slot:button-content>
            <i class="fa fa-bell fa-fw"></i>
            <span class="badge badge-danger badge-counter mr-n1">3+</span>
        </template>
        <b-dropdown-header class="bg-primary">Alerts Center</b-dropdown-header>         
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
      </b-nav-item-dropdown>
      <b-nav-item-dropdown class="no-arrow mx-1" right>
        <template v-slot:button-content>
            <i class="fa fa-envelope fa-fw"></i>
            <span class="badge badge-danger badge-counter">7</span>
        </template>
      </b-nav-item-dropdown>
      <div class="topbar-divider d-none d-sm-block"></div>
      <b-nav-item-dropdown class="no-arrow mx-1" right>
        <template v-slot:button-content>
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
          <img class="img-profile rounded-circle" src="/js/ledap/img/user.jpg">
        </template>
        <b-dropdown-item>
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </b-dropdown-item>
        <b-dropdown-item>
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Setting
        </b-dropdown-item>
        <b-dropdown-item>
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Active Log
        </b-dropdown-item>
        <div class="dropdown-divider"></div>
        <b-dropdown-item @click="logout('/site/logout')">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </b-dropdown-item>
      </b-nav-item-dropdown>
    </ul>
  </b-nav>
</div>
