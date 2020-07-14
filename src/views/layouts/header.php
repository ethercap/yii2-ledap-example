<div id="header">
    <b-nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button @click="toggleSideBar" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    <b-form inline class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <label class="sr-only" for="inline-form-input-name">搜索</label>
        <b-input-group>
            <b-input
              class="bg-light border-0 small"
              placeholder="Search For..."
            ></b-input>
            <b-input-group-append>
                <b-button variant="primary"><i class="fas fa-search fa-sm"></i></b-button>
            </b-input-group-append>
        </b-input-group>
    </b-form>
 
    <ul class="navbar-nav ml-auto">
        <b-nav-item-dropdown class="no-arrow mx-1" right menu-class="dropdown-list">
            <template v-slot:button-content>
                <i class="fa fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter mr-n1">{{alerts.num}}</span>
            </template>
            <b-dd-header>ALERT CENTER</b-dd-header>
            <b-dropdown-item link-class="d-flex align-items-center" v-for="item in alerts.items" :key="'alerts'+item.title">
                <div class="mr-3">
                    <div class="icon-circle bg-primary" :class="'bg-'+item.variant">
                        <i class="fas text-white" :class="item.icon"></i>
                    </div>
                </div> 
                <div>
                    <div class="small text-gray-500">{{item.date}}</div>
                    <span :class="{'font-weight-bold':item.important}">{{item.title}}</span>
                </div>
            </b-dropdown-item>
            <b-dropdown-item link-class="text-center small text-gray-500">
                Show All Alerts
            </b-dropdown-item>
        </b-nav-item-dropdown>
        

        <b-nav-item-dropdown class="no-arrow mx-1" right menu-class="dropdown-list">
            <template v-slot:button-content>
                <i class="fa fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter">7</span>
            </template>
            <b-dd-header>MESSAGE CENTER</b-dd-header>
            <b-dropdown-item link-class="d-flex align-items-center" v-for="item,index in msgs.items" :key="'msg'+index">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" :src="item.img" alt="">
                    <div class="status-indicator" :class="'bg-' + item.variant"></div>
                </div>
                <div :class="{'font-weight-bold':item.important}">
                    <div class="text-truncate">{{item.msg}}</div>
                    <div class="small text-gray-500">{{item.user}}</div>
                </div>
            </b-dropdown-item>
            <b-dropdown-item link-class="text-center small text-gray-500">
                Show All Messages
            </b-dropdown-item>
        </b-nav-item-dropdown>
      
        <div class="topbar-divider d-none d-sm-block"></div>
      <b-nav-item-dropdown class="no-arrow mx-1" right>
        <template v-slot:button-content>
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
          <img class="img-profile rounded-circle" src="/js/ledap/img/user.jpg" />
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
        <b-dropdown-item @click="logout('/ledap/default/index')">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </b-dropdown-item>
      </b-nav-item-dropdown>
    </ul>
  </b-nav>
</div>
