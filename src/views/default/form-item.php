<?php
\ethercap\ledapExample\assets\MarkdownAsset::register($this);
?>

<div class="w-75">
    <section class="mb-5">
        <h1 class="h3 mb-1 text-gray-800">form-item</h1>
        <div><span v-html="document"></span></div>
    </section>

    <form-item :model="model" attr="name"></form-item>
    <form-item :model="model" attr="introduce" maxlength="100">
        <template v-slot="slotProps">
            <baseinput v-bind="slotProps" tag="textarea" rows="10"></baseinput>
        </template>
    </form-item>
    <div class="d-flex mt-3">
        <div class="w-25"></div>
        <div class="flex-fill text-center">
            <button @click="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</div>
