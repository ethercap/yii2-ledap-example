<div class="w-75">
    <h1 class="h3 mb-5 text-gray-800">radio</h1>

    <form-item class="form-group" :model="model" attr="sex">
        <template v-slot="p">
            <groupinput v-bind="p">
                <template v-slot:default="p">
                    <radio v-bind="p" :key="p.dataKey">{{p.value}}</radio>
                </template>
            </groupinput>
        </template>
    </form-item>
    <div class="d-flex mt-3">
        <div class="w-25"></div>
        <div class="flex-fill text-center">
            <button @click="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</div>
