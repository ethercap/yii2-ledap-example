<?php
\ethercap\ledapExample\assets\MarkdownAsset::register($this);
?>

<div class="w-75">
    <section class="mb-5">
        <h1 class="h3 mb-1 text-gray-800">checkbox</h1>
        <div><span v-html="document"></span></div>
    </section>

    <form-item class="form-group" :model="model" attr="city">
        <template v-slot="p">
            <groupinput v-bind="p">
                <template v-slot:default="p">
                    <checkbox v-bind="p" :key="p.dataKey">{{p.value}}</checkbox>
                </template>
            </groupinput>
        </template>
    </form-item>
    <div class="flex-fill  mt-3 text-center">
        <button @click="submit" class="btn btn-primary">提交</button>
    </div>
</div>
