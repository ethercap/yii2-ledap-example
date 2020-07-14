<?php
$this->registerJsVar('data', [
    'model' => $model,
    'type' => $type,
]);
\ethercap\ledapExample\assets\MarkdownAsset::register($this);
?>
<b-card>
    <div class="markdown-body" v-show="type=='view'">
        <span v-html="value" ></span>
    </div>
    <div v-show="type !=='view'">
        <mavon-editor v-model="model.content" @save="submit" v-on="{imgAdd:$imgAdd}" ref="md" style="z-index:500;"></mavon-editor> 
    </div>
</b-card>
