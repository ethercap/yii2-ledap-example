<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" :class="{toggled:isToggle}"  id="sidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/ledap/">
    <div class="sidebar-brand-icon">
        <img src="/img/ledap-logo.png" width="24"></img>
    </div>
    <div class="sidebar-brand-text mx-3">ledap示例</div>
  </a>

  <div v-for="group in items" :key="group.id">
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      {{group.title}}
    </div>
    <b-nav-item v-for="obj in group.items" :href="obj.url" :class="{active : obj.id == menu}" :key="obj.id">
       <i class="fas fa-fw" :class="obj.icon"></i>
       <span>{{obj.title}}</span>
    </b-nav-item>
  </div>
<!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle" @click="toggle()"></button>
  </div>

</ul>
<!-- End of Sidebar -->
