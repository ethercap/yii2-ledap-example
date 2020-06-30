<?php
$this->title = 'Scores';
$this->registerJsVar('data', [
    'model' => $model,
]);
?>
<div class="score-index">
    <b-breadcrumb :items="[
        {text:'<?=$this->title?>', active:true}
    ]"></b-breadcrumb>
    <div class="card mb-5">
        <form class="card-body form-horizontal" @submit.stop.prevent>
            <div class="row">
                <div class="col-sm-4">
                    <form-item :model="dp.searchModel" attr="id"></form-item>
                </div>
                <div class="col-sm-4">
                    <form-item :model="dp.searchModel" attr="lessonId"></form-item>
                </div>
                <div class="col-sm-4">
                    <form-item :model="dp.searchModel" attr="studentId"></form-item>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <form-item :model="dp.searchModel" attr="score"></form-item>
                </div>
                <div class="col-sm-4">
                    <form-item :model="dp.searchModel" attr="creationTime"></form-item>
                </div>
                <div class="form-group col-sm-4">
                    <button class="btn btn-primary" @click="refresh()">查询</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <p class="text-right">
                <button class="btn btn-success" @click="create()">创建</button>
            </p>
            <div class="table-responsive">
                <grid class="table table-bordered table-striped table-hover" :data-provider="dp" :columns="columns">
                </grid>
            </div>
            <pager :data-provider="dp"></pager>
        </div>
    </div>
    <div class="page-loading-container" v-if="dp.isLoading || isLoading">
        <div class="page-loading">加载中…</div>
    </div>
    <b-modal size="lg" v-model="modalConfig.show">
        <div v-if="modalConfig.type == 'view'">
            <detail class="table table-bordered table-striped table-hover" :model="model" :columns="detailColumns">
            </detail>
        </div>
        <div v-else>
            <?= $this->render('_form'); ?>
        </div>
        <template v-slot:modal-footer>
            <div></div>
        </template>
    </b-modal>
</div>
