<div>
  <h2>Loading</h2>
  <div class="page-loading-container" v-if="isLoading">
    <div class="page-loading">加载中…</div>
  </div>
  <button class="btn btn-primary" @click="showLoading">显示loading 3秒</button>

  <h2>Alert</h2>
    <button class="btn btn-primary" @click="$alert('hello world')">Alert</button>
    <button class="btn btn-primary" @click="$alert('<span class=\'text-danger\' @click=\'vm.test\'>hello world</span>') ">Alert Html</button>

  <h2>Confirm</h2>
    <button class="btn btn-primary" @click="$confirm('hello world')">Confirm</button>
    <button class="btn btn-primary" @click="$confirm('<span class=\'text-danger\' @click=\'vm.test\'>hello world</span>') ">Confirm Html</button>
  <b-card class="my-3">
    <b-form class="col-6">
      <b-form-group label-cols="3" label="Title:">
        <b-form-input
          v-model="jsConfig.title"
          required
          placeholder="Enter title"
        ></b-form-input>
      </b-form-group>
      <b-form-group label-cols="3" label="cancelTitle:">
        <b-form-input
          v-model="jsConfig.cancelTitle"
          required
          placeholder="Enter cancelTitle"
        ></b-form-input>
      </b-form-group>

      <b-form-group label-cols="3" label="okTitle:">
        <b-form-input
          v-model="jsConfig.okTitle"
          required
          placeholder="Enter okTitle"
        ></b-form-input>
      </b-form-group>
      
      <b-form-group label-cols="3" label="Msg:">
        <b-form-input
          v-model="jsConfig.message"
          required
          placeholder="Enter Message"
        ></b-form-input>
      </b-form-group>
      <b-form-group label-cols="3" label="okVariant:">
        <b-form-select
          v-model="jsConfig.okVariant"
          :options="variants"
          required
          placeholder="Enter okVariant"
        ></b-form-select>
      </b-form-group>
      <b-form-group label-cols="3" label="ButtonSize:">
        <b-form-select
          v-model="jsConfig.buttonSize"
          :options="sizeList"
          required
          placeholder="Enter ButtonSize"
        ></b-form-select>
      </b-form-group>
      <b-form-group label-cols="3" label="Size:">
        <b-form-select
          v-model="jsConfig.size"
          :options="sizeList"
          required
          placeholder="Enter Size"
        ></b-form-select>
      </b-form-group>
    </b-form>
    <button class="btn btn-success" @click="showAlert">Show Alert</button>
    <button class="btn btn-info" @click="showConfirm">Show Confirm</button>
    <p class="text-muted mt-2">更多配置参见：<a href="https://bootstrap-vue.org/docs/components/modal" target="_blank">bvModal</a></p>
  </b-card>

  <h2>toast</h2>
    <button class="btn btn-primary" @click="$toast('hello world')">toast</button>
    <button class="btn btn-primary" @click="$toast('<span class=\'text-danger\' @click=\'vm.test\'>hello world</span>') ">Toast Html</button>
    <p class="text-muted mt-2">更多配置参见：<a href="https://bootstrap-vue.org/docs/components/toast#toasts-on-demand" target="_blank">bvToast</a></p>
</div>
