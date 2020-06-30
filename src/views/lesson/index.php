<?php
$this->title = 'Lessons';
$this->registerJsVar('data', [
    'model' => $model,
]);
?>
<div class="lesson-index">
    <b-breadcrumb :items="[
        {text:'<?=$this->title?>', active:true}
    ]"></b-breadcrumb>
    <b-card class="mb-5">
        <form class="form-horizontal" @submit.stop.prevent>
            <b-row>
                <b-col>
                    <form-item :model="dp.searchModel" attr="name"></form-item>
                </b-col>
                <b-col>
                    <form-item :model="dp.searchModel" attr="creationTime"></form-item>
                </b-col>
                <b-col class="form-group">
                    <button class="btn btn-primary" @click="refresh()">查询</button>
                </b-col>
            </b-row>
        </form>
    </b-card>

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
