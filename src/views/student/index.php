<?php
$this->title = 'Students';
?>
<div class="student-index">
    <b-breadcrumb :items="[
        {text:'<?=$this->title?>', active:true}
    ]"></b-breadcrumb>
    <b-card class="card mb-5">
        <form class="form-horizontal" @submit.stop.prevent>
            <b-row>
                <b-col>                    
                    <form-item :model="dp.searchModel" attr="name"></form-item>
                </b-col>
                <b-col>
                    <form-item :model="dp.searchModel" attr="mobile"></form-item>
                </b-col>
                <b-col class="form-group">
                    <button class="btn btn-primary" @click="refresh()">查询</button>
                </b-col>
            </b-row>
        </form>
    </b-card>

    <b-card class="card mb-5">
        <p class="text-right">
            <a class="btn btn-success" href="/ledap/student/view?type=create">创建</a>
        </p>
        <div class="table-responsive">
            <grid class="table table-bordered table-striped table-hover" :data-provider="dp" :columns="columns">
            </grid>
        </div>
        <pager :data-provider="dp"></pager>
    </b-card>
    <div class="page-loading-container" v-if="dp.isLoading">
        <div class="page-loading">加载中…</div>
    </div>
</div>
