<template>
  <GlobalHeader :users="this.users"/>
  <el-container class="search-container">
    <div class="job-header">
      <div class="box-search-job" id="box-search-job">
        <div class="container">
          <el-input @keydown.enter="getJobs" placeholder="Vị trí tuyển dụng" prefix-icon="Search"
                    v-model="searchValue">
          </el-input>
          <el-button @click="getJobs" icon="Search" type="success">Tìm kiếm</el-button>
        </div>
      </div>
    </div>
  </el-container>
  <el-container>
    <div class="job-list-search-result">
      <h4>Trọng số</h4>
      <div class="filter">
        <div class="input-filter">
          <label for="salary_expect">Mức lương mong muốn</label>
          <el-input type="number" id="salary_expect" v-model="salary_expect"></el-input>
        </div>
        <div class="input-filter">
          <label for="gpa">GPA</label>
          <el-input type="number" id="gpa" v-model="gpa"></el-input>
        </div>
        <div class="input-filter">
          <label for="experience">Kinh nghiệm</label>
          <el-input type="number" id="experience" v-model="experience"></el-input>
        </div>
        <div class="input-filter">
          <el-button @click="getJobs" icon="Search" type="success">Lọc</el-button>
        </div>
      </div>
      <h3>Tìm thấy {{ jobs.length }} việc làm đang tuyển dụng</h3>
      <div v-for="item in jobs" class="job-item-search-result">
        <div class="avatar"><img :src="item.company.image" alt=""/></div>
        <div class="body">
          <div class="body-content">
            <div class="title-block">
              <h3 class="title">
                                <span>
                                    {{ item.name }}
                                </span>
              </h3>
              <div class="company-name">
                {{ item.company.name }}
              </div>
            </div>
            <div class="salary-block">
              <span>
                {{ displaySalary(item.salary_form, item.salary_to) }}</span>
            </div>
          </div>
          <div class="info">
            <div class="label-content">
              <el-tag type="success"> {{ displayJobType(item.job_type) }}</el-tag>
              <el-tag> GPA từ {{ item.gpa_from }}</el-tag>
              <el-tag type="warning"> {{ displayExperience(item.experience) }}</el-tag>
            </div>
            <div class="icon">
              <el-button class="btn-apply" @click="onApply" type="success">Ứng tuyển</el-button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </el-container>
</template>
<script>
import {defineComponent} from "vue";
import GlobalHeader from "../layout/GlobalHeader.vue";
import store from "../stores/_loader.js";
import moment from "moment";

export default defineComponent({
  components: {GlobalHeader},
  data() {
    return {
      isOpenDialogLogin: false,
      isOpenDialogRegister: false,
      formLabelWidth: '120px',
      jobs: [],
      userSelect: '',
      searchValue: '',
      users: [],
      currentDate: moment(),
      salary_expect: 0,
      gpa: 0,
      experience: 0,
    }
  },
  computed: {},
  methods: {
    async getJobs() {
      try {
        let params = {
          search: this.searchValue,
          user_id: store.getters["auth/getUser"]?.id ?? '',
          salary: parseFloat(this.salary_expect) ?? 0,
          gpa: parseFloat(this.gpa) ?? 0,
          experience: parseFloat(this.experience) ?? 0,
        }
        const response = await axios.get(
            "http://localhost:8000/api/get-job-suggests",
            {params: params},
        );
        this.jobs = response.data.data;
      } catch (error) {
        console.error("Error fetching Jobs:", error);
      }
    },
    displayJobType(value) {
      switch (value) {
        case 0:
          return 'Full-time';
        case 1:
          return 'Part-time';
        case 2:
          return 'Hybrid';
        case 3:
          return 'Remote';
        default:
          return '';
      }
    },
    displaySalary(minSalary, maxSalary) {
      const formatNumber = (number) => {
        return number.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'});
      };
      if (minSalary && maxSalary) {
        return `${formatNumber(minSalary)} - ${formatNumber(maxSalary)} triệu`;
      } else if (minSalary && !maxSalary) {
        return `Từ ${formatNumber(minSalary)} triệu`;
      } else if (!minSalary && maxSalary) {
        return `Tới ${formatNumber(maxSalary)} triệu`;
      } else {
        return 'Thương lượng';
      }
    },
    displayExperience(value) {
      if (value) {
        return `${value} năm kinh nghiệm`;
      }
      return 'Không yêu cầu kinh nghiệm';
    },
    async getAllUsers() {
      try {
        const response = await axios.get(
            "http://localhost:8000/api/users",
            {},
        );
        this.users = response.data.data;
      } catch (error) {
        console.error("Error fetching users:", error);
      }
    },
    onApply() {
    },
  },
  async mounted() {
    await this.getAllUsers()
    await this.getJobs()
    this.userSelect = store.getters["auth/getUser"]?.id ?? '';
  },
  watch: {
    salary_expect: function (newVal, oldVal) {
      if (this.gpa === 0 && this.experience === 0) {
        this.gpa = this.experience = (1 - newVal) / 2;
      } else if (this.gpa !== 0 || this.experience !== 0) {
        if (this.gpa !== 0) {
          this.experience = 1 - this.gpa - newVal;
        } else this.gpa = 1 - this.experience - newVal < 0 ? 0 : 1 - this.experience - newVal
      }
    },
  }
})
</script>
<style lang="scss" scoped>
.search-container {
  width: 100vw;

  .box-search-job {
    background: url('https://static.topcv.vn/v4/image/search-job/bg-search-left-opacity.png'), url('https://static.topcv.vn/v4/image/search-job/bg-search-right.png'), linear-gradient(90deg, #212f3f, #00b14f);
    background-position: 0 0, 100% 0, 50%;
    background-repeat: no-repeat;
    background-size: auto 340px, auto 340px, 100% 100%;
    font-family: Inter, sans-serif;
    font-style: normal;
    padding: 16px 0;
  }

  .job-header {
    width: 100%;
  }

  .container {
    width: 1170px;
    margin: auto;
    height: 104px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: row;

    :deep(.el-input__wrapper) {
      height: 48px;
    }

    :deep(.el-button--success) {
      height: 50px;
      background-color: #00c056;
      border: none;
      margin-left: 32px;
    }
  }
}

.job-list-search-result {
  width: 1174px;
  margin: auto;
  margin-bottom: 100px;

  .filter {
    display: flex;

    .input-filter {
      display: flex;
      justify-content: flex-start;
      margin-right: 20px;

      button {
        background-color: #00c056;
      }

      label {
        margin-right: 10px;
        white-space: nowrap;
        align-content: center;
      }

      .el-input {
        width: 80px !important;
      }
    }
  }
}

.job-item-search-result {
  border-radius: 8px;
  box-shadow: 0 8px 16px 0 rgba(1, 18, 34, .04);
  cursor: pointer;
  display: flex;
  gap: 20px;
  grid-template-columns: 1fr 5fr;
  margin-bottom: 12px;
  padding: 12px;
  position: relative;
  transition: all .1s;
  background-color: #f2fbf6;
  border: 1px solid #acf2cb;

  &:hover {
    background-color: #f2fbf6;
    border: 1px solid #00b14f;
  }

  .avatar {
    align-items: center;
    aspect-ratio: 1 / 1;
    border: 1px solid #e9eaec;
    border-radius: 8px;
    display: flex;
    height: 120px;
    margin: 0 auto;
    -o-object-fit: contain;
    object-fit: cover;
    padding: 8px;
    position: relative;
    width: 120px;

    img {
      border-radius: 5px;
      height: 100%;
      -o-object-fit: contain;
      object-fit: contain;
      width: 100%;
    }
  }

  .body {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    .info {
      display: flex;
      flex-direction: row;
      margin-top: 24px;
      justify-content: space-between;

      .label-content {
        align-items: center;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;

        label {
          background: #e9eaec;
          border-radius: 3px;
          color: #212f3f;
          font-size: 12px;
          font-weight: 400;
          line-height: 16px;
          margin-bottom: 0;
          margin-top: 0;
          padding: 4px 8px;
        }
      }

      .icon {
        width: 150px;
        display: flex;
        justify-content: flex-end;

        .btn-apply {
          align-items: center;
          background: #00b14f;
          border-radius: 3px;
          color: #fff;
          display: flex;
          font-size: 12px;
          font-weight: 400;
          height: 28px;
          line-height: 16px;
          outline: none;
          padding: 6px 16px;
          transition: .3s;
        }
      }
    }
  }

  .body-content {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }

  .title-block {
    width: 80%;
  }

  .salary-block {
    color: #00b14f;
    display: flex;
    font-size: 14px;
    font-weight: 600;
    gap: 10px;
    justify-content: flex-end;
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 0;
    white-space: nowrap;
    width: 200px;
  }

  .title {
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    color: #00b14f;
    display: -webkit-box;
    flex: 1;
    font-weight: 600;
    line-height: 0;
    margin-bottom: 4px;
    margin-right: 24px;
    margin-top: 0;
    overflow: hidden;
    overflow-wrap: break-word;
    text-overflow: ellipsis;

    span {
      color: #00b14f;
      font-size: 16px;
      font-weight: 600;
      line-height: 24px;
    }
  }
}
</style>