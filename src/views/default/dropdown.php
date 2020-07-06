<div class="w-75">
    <h1 class="h3 mb-5 text-gray-800">dropdown</h1>

    <form-item :model="model" attr="city">
        <template v-slot="p">
            <dropdown v-bind="p"></dropdown>
        </template>
    </form-item>
    <div class="d-flex mt-3">
        <div class="w-25"></div>
        <div class="flex-fill text-center">
            <button @click="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</div>
