<form class="form-horizontal" @submit.stop.prevent>
    <form-item :model="model" attr="id"></form-item>
    <form-item :model="model" attr="lessonId"></form-item>
    <form-item :model="model" attr="studentId"></form-item>
    <form-item :model="model" attr="score"></form-item>
    <form-item :model="model" attr="creationTime"></form-item>
    <form-item :model="model" attr="updateTime"></form-item>
    <div class="form-group col-sm-6 offset-sm-3">
        <button class="btn btn-success" @click="submit">提交</button>
    </div>
</form>
