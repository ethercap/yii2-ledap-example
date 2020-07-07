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
                <b-col cols="4">
                    <form-item :model="dp.searchModel" attr="name"></form-item>
                </b-col>
                <b-col cols="8">
                    <form-item :model="dp.searchModel" attr="from">
                        <b-row>
                            <b-col>
                                <b-form-datepicker  v-model="dp.searchModel.from"></b-form-datepicker>
                            </b-col>
                            <b-col cols="1" class="text-center mt-2">-</b-col>
                            <b-col>
                                <b-form-datepicker  v-model="dp.searchModel.to"></b-form-datepicker>
                            </b-col>
                        </b-row>
                    </form-item>
                </b-col>
                <b-col class="form-group">
                    <button class="btn btn-primary" @click="refresh()">查询</button>
                </b-col>
            </b-row>
        </form>
    </b-card>

    <b-card>
        <p class="text-right">
            <button class="btn btn-success" @click="create()">创建</button>
        </p>
        <div class="table-responsive">
            <grid class="table table-bordered table-striped table-hover" :data-provider="dp" :columns="columns">
            </grid>
        </div>
        <pager :data-provider="dp"></pager>
    </b-card>
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
