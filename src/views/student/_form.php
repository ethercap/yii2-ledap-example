<form class="form-horizontal col-sm-6 offset-sm-3" @submit.stop.prevent>
    <form-item :model="model" attr="name"></form-item>
    <form-item :model="model" attr="mobile"></form-item>
    <form-item :model="model" attr="gender">
        <template v-slot="p">
            <dropdown v-bind="p"></dropdown>
        </template>
    </form-item>
    <div class="form-group col-sm-6 offset-sm-3">
        <button class="btn btn-success" @click="submit">提交</button>
    </div>
</form>
