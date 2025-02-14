<template>
  <el-container class="form-wrapper">
    <el-form class="form" ref="form" :model="form" label-width="120px">
      <el-form-item label="Tên công việc">
        <el-input v-model="form.jobName" placeholder="Nhập tên công việc"></el-input>
      </el-form-item>
      <el-form-item label="Địa điểm">
        <el-input v-model="form.region" placeholder="Nhập địa điểm"></el-input>
      </el-form-item>
      <el-form-item label="Thời gian">
        <el-date-picker v-model="form.dateRange" type="datetimerange" range-separator="-"
                        start-placeholder="Ngày bắt đầu" end-placeholder="Ngày kết thúc">
        </el-date-picker>
      </el-form-item>
      <el-row>
        <label class="el-form-item__label" style="width: 120px;">Mức lương</label>
        <el-form-item label="Min">
          <el-input type="number" v-model="form.minSalary" placeholder=""></el-input>
        </el-form-item>
        <el-form-item label="Max">
          <el-input type="number" v-model="form.maxSalary" placeholder=""></el-input>
        </el-form-item>
      </el-row>
      <el-form-item label="Số lượng">
        <el-input type="number" v-model="form.quantity" placeholder="Nhập số lượng"></el-input>
      </el-form-item>
      <el-form-item label="Level">
        <el-select v-model="form.level" placeholder="Chọn level">
          <el-option label="Fresher" :value="1"></el-option>
          <el-option label="Junior" :value="2"></el-option>
          <el-option label="Middle" :value="3"></el-option>
          <el-option label="Senior" :value="4"></el-option>
        </el-select>
      </el-form-item>
      <el-form-item label="Job type">
        <el-input type="number" v-model="form.type" placeholder="Nhập job type"></el-input>
      </el-form-item>
      <el-form-item label="Giới tính">
        <el-radio-group v-model="form.gender">
          <el-radio label="Nam" :value="0"></el-radio>
          <el-radio label="Nữ" :value="1"></el-radio>
          <el-radio label="Khác" :value="2"></el-radio>
        </el-radio-group>
      </el-form-item>
      <el-form-item label="Skill">
        <el-checkbox-group v-model="form.skill">
          <el-checkbox label="Skill 1" name="type"></el-checkbox>
          <el-checkbox label="Skill 2" name="type"></el-checkbox>
          <el-checkbox label="Skill 3" name="type"></el-checkbox>
          <el-checkbox label="Skill 4" name="type"></el-checkbox>
        </el-checkbox-group>
      </el-form-item>
      <el-form-item label="Job position">
        <el-checkbox-group v-model="form.positions">
          <el-checkbox label="position 1" name="type"></el-checkbox>
          <el-checkbox label="position 2" name="type"></el-checkbox>
          <el-checkbox label="position 3" name="type"></el-checkbox>
          <el-checkbox label="position 4" name="type"></el-checkbox>
        </el-checkbox-group>
      </el-form-item>
      <el-form-item label="Kinh nghiệm">
        <el-input type="number" v-model="experience" placeholder="Nhập số năm kinh nghiệm"></el-input>
      </el-form-item>
      <el-form-item label="Mô tả">
        <el-input type="textarea" v-model="form.desc" placeholder="Mô tả..."></el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="onSubmit()">Tạo mới</el-button>
        <el-button @click="onCancel()">Hủy bỏ</el-button>
      </el-form-item>
    </el-form>
  </el-container>
</template>
<script>
import {defineComponent} from "vue";
import store from "../../stores/_loader.js";

export default defineComponent(
    {
      name: 'JobForm',
      props: ['jobForm'],
      emits: ['submit', 'cancel'],
      data() {
        return {
          form: this.$props.jobForm,
          userId: store.getters["auth/getUser"]?.id ?? '',
          userInfo: [],
        }
      },
      computed: {},
      methods: {
        async getDataUser() {
          const response = await axios.get(
              "http://localhost:8000/api/users/" + this.userId,
              {},
          );
          this.userInfo = response.data.data
        },
        onCancel() {
          this.$emit('cancel')
        }
      },
      async mounted() {
        await this.getDataUser()
      }
    }
)
</script>
<style lang="scss" scoped>
:deep(input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button) {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  margin: 0;
}
</style>