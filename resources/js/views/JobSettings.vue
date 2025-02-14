<template>
  <GlobalHeader :users="this.users"/>
  <div class="container">
    <div class="page-img">
      <img src="https://static.topcv.vn/v4/image/suggest-job-setting/banner.png" alt="">
    </div>
    <div class="box-header">
      <h4>Ngành nghề: <i v-if="userId === 2"> Giáo dục</i><i v-if="userId === 1">IT Phần Mềm</i><i v-else>Kinh doanh</i>
      </h4>
    </div>
    <el-form ref="form" class="form" @submit="submit">
      <div class="box-content">
        <div class="box-need-work">
          <div class="title">
            <span>Nhu cầu công việc</span>
          </div>
          <el-form-item class="form-item" label="Kinh nghiệm làm việc">
            <el-input required v-model="form.exp" placeholder="Nhập kinh nghiệm làm việc"></el-input>
          </el-form-item>
          <el-form-item class="form-item" label="Mức lương mong muốn">
            <el-input required v-model="formattedSalary" placeholder="Mức lương mong muốn"></el-input>
          </el-form-item>
          <el-form-item class="form-item" label="Điểm GPA">
            <el-input required v-model="form.gpa" placeholder="Điểm GPA"></el-input>
          </el-form-item>
        </div>
        <div class="btn-wrap">
          <el-button>Cập nhật</el-button>
        </div>
      </div>
    </el-form>
  </div>
</template>
<script>
import {defineComponent} from "vue";
import GlobalHeader from "../layout/GlobalHeader.vue";
import {jobOptions, skillOptions, expOptions, jobTypeOptions} from '../../helper'
import store from "../stores/_loader.js";

export default defineComponent({
  components: {GlobalHeader},
  data() {
    return {
      form: {
        salary: null,
        exp: null,
        gpa: null,
      },
      options: [],
      skillOptions: [],
      expOptions: expOptions,
      jobTypeOptions: jobTypeOptions,
      loading: false,
      users: [],
      userInfo: [],
      userId: store.getters["auth/getUser"]?.id ?? '',
    }
  },
  computed: {
    formattedSalary() {
      return new Intl.NumberFormat('vi-VN').format(this.form.salary);
    }
  },
  methods: {
    async getAllUsers() {
      try {
        const response = await axios.get(
            "http://localhost:8000/api/users",
            {},
        );
        this.users = response.data.data;
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    },
    async getDetailUser() {
      const response = await axios.get(
          "http://localhost:8000/api/users/" + this.userId,
          {},
      );
      this.form.gpa = response.data.data.user_infor.gpa
      this.form.salary = response.data.data.user_infor.salary_expect
      this.form.exp = response.data.data.user_infor.experience
    },
    submit() {
    },
  },
  async mounted() {
    await this.getAllUsers();
    await this.getDetailUser();
  },
})
</script>
<style lang="scss" scoped>
.container {
  width: 1174px;
  margin: auto;

  :deep(.el-radio__input.is-checked .el-radio__inner) {
    background-color: #00c056;
    border-color: #00c056;
  }

  :deep(.el-radio__input.is-checked+.el-radio__label) {
    color: #00c056;
  }

  .page-img {
    display: flex;
    justify-content: center;
  }

  .box-header {
    border-bottom: 1px solid #f4f5f5;
    padding: 16px 24px;
    width: 50%;
    margin: auto;

    h4 {
      color: #212f3f;
      font-size: 19px;
      font-weight: 700;
      margin: 0 0 8px;
    }
  }

  .box-content {
    padding: 24px 24px 28px;
    width: 50%;
    margin: auto;

    .title {
      color: #212f3f;
      font-size: 17px;
      font-weight: 700;
      margin-bottom: 16px;
    }

    :deep(.el-button.el-button--submit) {
      background-color: #00c056;
      color: #fff;
      width: 172px;
      font-weight: 700;
      padding: 10px 20px;
      margin: auto;
    }
  }

  .box-info {
    border-bottom: 1px solid #f4f5f5;
    padding-bottom: 24px;
  }

  .form-item {
    display: flex;
    flex-direction: column;

    :deep(.el-form-item__label) {
      display: block;
      width: 100%;
      color: #212f3f;
      font-size: 15px;
      margin-bottom: 16px;
      height: unset;
      line-height: unset;
    }
  }

  .box-need-work {
    padding-top: 20px;
  }

  .btn-wrap {
    padding-left: calc(50% - 86px);

    .el-button {
      background-color: #00c056;
      color: #fff;
      border: none;
    }
  }
}
</style>