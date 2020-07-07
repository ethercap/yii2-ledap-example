<div class="w-75">
    <h1 class="h3 mb-5 text-gray-800">tab</h1>

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
