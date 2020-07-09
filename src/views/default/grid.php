<?php
\ethercap\ledapExample\assets\MarkdownAsset::register($this);
?>

<div class="w-75 mx-auto">
    <section class="mb-5">
        <h1 class="h3 mb-1 text-gray-800">grid & pager</h1>
        <div><span v-html="document"></span></div>
    </section>

    <grid class="table table-striped" :data-provider="dp" :columns="columns"></grid>
    <pager :data-provider="dp"></pager>
    <div class="d-flex mt-3">
        <div class="w-25"></div>
    </div>
</div>
