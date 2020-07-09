<?php
\ethercap\ledapExample\assets\MarkdownAsset::register($this);
?>

<div class="w-75">
    <section class="mb-5">
        <h1 class="h3 mb-1 text-gray-800">select2</h1>
        <div><span v-html="document"></span></div>
    </section>

    <form-item class="form-group" :model="model" attr="search1">
        <template v-slot="p">
            <select2 v-bind="p" :data-provider="dp" @choose="choose" item-name="text">
            </select2>
        </template>
    </form-item>
    <form-item class="form-group" :model="model" attr="search2">
        <template v-slot="p">
            <select2 v-bind="p" :data-provider="dp" @choose="choose" :multiple="true" item-name="text">
            </select2>
        </template>
    </form-item>
    <div class="d-flex mt-3">
        <div class="w-25"></div>
        <div class="flex-fill text-center">
            <button @click="submit" class="btn btn-primary">提交</button>
        </div>
    </div>

</div>
