<div id="header">
  <b-nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button @click="toggleSideBar" class="btn btn-link rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
      <b-nav-item-dropdown class="no-arrow" right>
        <template v-slot:button-content>
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=\Yii::$app->user->identity->name ?? '游客'?></span>
          <img class="img-profile rounded-circle" src="<?=\Yii::$app->user->identity->avatar ?? '/img/guest-user.jpg'?>">
        </template>
        <div class="dropdown-divider"></div>
        <b-dropdown-item @click="logout('/site/logout')">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          退出
        </b-dropdown-item>
      </b-nav-item-dropdown>
    </ul>
  </b-nav>
</div>
