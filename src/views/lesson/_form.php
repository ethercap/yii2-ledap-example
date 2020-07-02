<form class="form-horizontal" @submit.stop.prevent>
    <form-item :model="model" attr="name"></form-item>
    <form-item :model="model" attr="comment">
        <template v-slot="p">
            <baseinput tag="textarea" v-bind="p"></baseinput>
        </template>
    </form-item>
    <form-item :model="model" attr="status">
        <template v-slot="p">
            <groupinput v-bind="p"></groupinput>
        </template>
    </form-item>
    <div class="form-group col-sm-6 offset-sm-3">
        <button class="btn btn-success" @click="submit">提交</button>
    </div>
</form>
