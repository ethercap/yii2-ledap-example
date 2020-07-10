<?php
\ethercap\ledapExample\assets\MarkdownAsset::register($this);
?>

<div class="w-75">
    <section class="mb-5">
        <h1 class="h3 mb-1 text-gray-800">tab</h1>
        <div><span v-html="document"></span></div>
    </section>

    <form-item class="form-group" :model="model" attr="city">
        <template v-slot="p">
            <!-- groupinput内部默认是tab组件 -->
            <groupinput v-bind="p"></groupinput>
        </template>
    </form-item>
    <div class="flex-fill  mt-3 text-center">
        <button @click="submit" class="btn btn-primary">提交</button>
    </div>
</div>
