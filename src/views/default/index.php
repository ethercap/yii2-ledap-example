<?php
$this->registerJsVar('data', $data);
\ethercap\ledapExample\assets\VchartAsset::register($this);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<b-row>
  <b-col cols="3" class="mb-4" v-for="item in saleData" :key="item.title">
    <b-card class="shadow h-100 py-2" :class="'border-left-'+item.variant">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-uppercase mb-1" :class="'text-'+item.variant">{{item.title}}</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{item.subTitle}}</div>
            </div>
            <div class="col" v-if="item.progress">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar" :class="'bg-'+item.variant" role="progressbar" :style="{width: item.progress + '%'}" :aria-valuenow="item.progress" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
             </div>
          </div>    
        </div>
        <div class="col-auto">
          <i class="fas fa-2x text-gray-300" :class="item.icon"></i>
        </div>
      </div>
    </b-card>
  </b-col>
</b-row>

  <!-- Content Row -->
  <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
          <b-dropdown class="no-arrow" toggle-tag="a" toggle-class="dropdown-toggle" variant="light" right>
            <template v-slot:button-content>
                <i class="fa fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </template>
            <b-dropdown-header>
                Dropdown Header:
            </b-dropdown-header>
            <b-dropdown-item>
              <a class="dropdown-item" href="#">Action</a>
            </b-dropdown-item>
            <b-dropdown-item>
              <a class="dropdown-item" href="#">Another action</a>
            </b-dropdown-item>
            <b-dropdown-divider></b-dropdown-divider>
            <b-dropdown-item>
              <a class="dropdown-item" href="#">Something else here</a>
            </b-dropdown-item>
          </b-dropdown>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <ve-line :data="chartData" :settings="chartSettings"></ve-line>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
          <b-dropdown class="no-arrow" toggle-tag="a" toggle-class="dropdown-toggle" variant="light" right>
            <template v-slot:button-content>
                <i class="fa fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </template>
            <b-dropdown-header>
                Dropdown Header:
            </b-dropdown-header>
            <b-dropdown-item>
              <a class="dropdown-item" href="#">Action</a>
            </b-dropdown-item>
            <b-dropdown-item>
              <a class="dropdown-item" href="#">Another action</a>
            </b-dropdown-item>
            <b-dropdown-divider></b-dropdown-divider>
            <b-dropdown-item>
              <a class="dropdown-item" href="#">Something else here</a>
            </b-dropdown-item>
          </b-dropdown>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <ve-pie :data="pieData"></ve-pie>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

      <!-- Project Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
        </div>
        <div class="card-body">
          <div v-for="project in projects" :key="'project'+project.title"> 
            <h4 class="small font-weight-bold">{{project.title}} <span class="float-right">{{project.value == '100%' ? 'Complete!' : project.value}}</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" :class="'bg-'+project.variant" :style="{width: project.value}" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
          </div> 
        </div>
      </div>


      <b-row>
        <b-col cols="6" class="mb-4" v-for="item in colors" :key="item.title">
            <b-card class="shadow" :class="[item.bg, item.textblack ? 'text-black' : 'text-white']">
                {{item.title}}
                <div class="small" :class="[item.textblack ? 'text-black-50' : 'text-white-50']">{{item.value}}</div>
            </b-card>
        </b-col>
      </b-row>      


    </div>

    <div class="col-lg-6 mb-4">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
        </div>
        <div class="card-body">
          <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_posting_photo.svg" alt="">
          </div>
          <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
          <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw →</a>
        </div>
      </div>

      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
        </div>
        <div class="card-body">
          <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
          <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
        </div>
      </div>

    </div>
  </div>

