<?php
\ethercap\ledapExample\assets\MarkdownAsset::register($this);
?>

<div class="w-75">
    <section class="mb-5">
        <h1 class="h3 mb-1 text-gray-800">searchinput</h1>
        <div><span v-html="document"></span></div>
    </section>

    <form-item class="form-group" :model="model" attr="search">
        <template v-slot="p">
            <searchinput v-bind="p" :data-provider="dp" @choose="choose" item-name="text">
            </searchinput>
        </template>
    </form-item>
    <div class="d-flex mt-3">
        <div class="w-25"></div>
        <div class="flex-fill text-center">
            <button @click="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</div>
