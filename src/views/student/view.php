<?php
if ($type == 'create') {
    $this->title = '创建';
} else {
    $this->title = '编辑'.$model['name']['value'];
}
$this->registerJsVar('data', [
    'model' => $model,
    'type' => $type,
]);
?>
<b-breadcrumb :items="[
    {text:'Students', href:'/ledap/student/index'},
    {text:'<?=$this->title?>', active:true}
]"></b-breadcrumb>
<div class="student-view">
    <b-card>
        <button class="btn btn-outline-primary mb-3" @click="changeType()" v-if="type !== 'create'">{{type==="update" ? "查看" : "编辑"}}</button>
        <div v-if="type==='view'">
            <detail class="table table-bordered table-striped table-hover" :model="model" :columns="columns">
            </detail>
        </div>
        <div v-else>
            <?= $this->render('_form'); ?>
        </div>
    </b-card>
    <div class="page-loading-container" v-if="isLoading">
        <div class="page-loading">加载中…</div>
    </div>
</div>
