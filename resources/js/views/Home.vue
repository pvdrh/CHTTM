<template>
  <div id="home">
    <GlobalHeader :users="this.users"/>
    <el-container>
      <div class="carousel">
        <el-carousel height="500px">
          <el-carousel-item v-for="item in images" :key="item">
            <img
                style="width: 100%"
                :src="item"
                alt="image-banner"
            />
          </el-carousel-item>
        </el-carousel>
      </div>
    </el-container>
    <el-container>
      <div class="top-company">
        <h3 class="title-company">Top ngành nghề nổi bật</h3>
        <div>
          <el-row>
            <el-col :span="5">
              <div class="col-item">
                <img
                    src="https://www.topcv.vn/v4/image/welcome/top-categories/kinh-doanh-ban-hang.png?v=2"
                    alt="image-banner" style="width: 100%"/>
                <h5>Kinh doanh / Bán hàng</h5>
              </div>
            </el-col>
            <el-col :span="5">
              <div class="col-item">
                <img
                    src="https://www.topcv.vn/v4/image/welcome/top-categories/it-phan-mem.png?v=2"
                    alt="image-banner" style="width: 100%"/>
                <h5>IT phần mềm</h5>
              </div>
            </el-col>
            <el-col :span="5">
              <div class="col-item">
                <img
                    src="https://www.topcv.vn/v4/image/welcome/top-categories/hanh-chinh-van-phong.png?v=2"
                    alt="image-banner" style="width: 100%"/>
                <h5>Hành chính / Văn phòng</h5>
              </div>
            </el-col>
            <el-col :span="5">
              <div class="col-item">
                <img
                    src="https://www.topcv.vn/v4/image/welcome/top-categories/giao-duc-dao-tao.png?v=2"
                    alt="image-banner" style="width: 100%"/>
                <h5>Giáo dục / Đào tạo</h5>
              </div>
            </el-col>
          </el-row>

          <el-row style="margin-top: 40px">
            <el-col :span="5">
              <div class="col-item">
                <img
                    src="https://www.topcv.vn/v4/image/welcome/top-categories/tu-van.png?v=2"
                    alt="image-banner" style="width: 100%"/>
                <h5>Tư vấn</h5>
              </div>
            </el-col>
            <el-col :span="5">
              <div class="col-item">
                <img
                    src="https://www.topcv.vn/v4/image/welcome/top-categories/marketing-truyen-thong-quang-cao.png?v=2"
                    alt="image-banner" style="width: 100%"/>
                <h5>Marketing</h5>
              </div>
            </el-col>
            <el-col :span="5">
              <div class="col-item">
                <img
                    src="https://www.topcv.vn/v4/image/welcome/top-categories/van-tai-kho-van.png?v=2"
                    alt="image-banner" style="width: 100%"/>
                <h5>Vận tải / Kho vận</h5>
              </div>
            </el-col>
            <el-col :span="5">
              <div class="col-item">
                <img
                    src="https://www.topcv.vn/v4/image/welcome/top-categories/ke-toan-kiem-toan.png?v=2"
                    alt="image-banner" style="width: 100%"/>
                <h5>Kế toán / Kiểm toán</h5>
              </div>
            </el-col>
          </el-row>
        </div>
      </div>
    </el-container>
    <el-container style="margin-top: 50px">
      <el-footer>
        <el-row>
          <el-col :span="6">
            <div>
              <img
                  style="width: 330px; height: 130px"
                  src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/logo/topcv-logo-footer-6.png"
                  alt="logo-footer">
            </div>
            <div>
              <p class="title-first">Kết nối với chúng tôi</p>
              <ul class="list-first">
                <li><img
                    src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/footer/facebook.png"
                    alt=""></li>
                <li><img
                    src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/footer/youtube.png"
                    alt=""></li>
                <li><img
                    src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/footer/linkedin.png"
                    alt=""></li>
              </ul>
            </div>
          </el-col>
          <el-col :span="11">
            <el-row>
              <el-col :span="8">
                <h5>Về TopCV</h5>
                <ul>
                  <li>Giới thiệu</li>
                  <li>Điều khoản dịch vụ</li>
                  <li>Chính sách bảo mật</li>
                  <li>Quy chế hoạt động</li>
                </ul>
              </el-col>
              <el-col :span="8">
                <h5>Khám phá</h5>
                <ul>
                  <li>Trắc nghiệm MBTI</li>
                  <li>Lập kế hoạch tiết kiệm</li>
                  <li>Tính lương Gross - Net</li>
                  <li>Tính lãi suất kép</li>
                </ul>
              </el-col>
              <el-col :span="8">
                <h5>Đối tác</h5>
                <ul>
                  <li>TestCenter</li>
                  <li>TopHR</li>
                  <li>SoICT</li>
                  <li>ViecNgay</li>
                </ul>
              </el-col>
            </el-row>
          </el-col>
          <el-col :span="7">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6310190223644!2d105.83993977517585!3d21.007422880636636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab8a922653a9%3A0x6c2ec19683313eab!2zMSDEkOG6oWkgQ-G7kyBWaeG7h3QsIELDoWNoIEtob2EsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1703056796565!5m2!1sen!2s"
                width="400"
                height="220"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </el-col>
        </el-row>
        <el-row>
          <p class="copy-right">
            © IT6340 - Các hệ thống thông minh</p>
        </el-row>
      </el-footer>
    </el-container>
  </div>
  <el-dialog title="Shipping address" :visible.sync="isOpenDialogLogin">
    <el-form :model="form">
      <el-form-item label="Promotion name" :label-width="formLabelWidth">
        <el-input v-model="form.name" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Zones" :label-width="formLabelWidth">
        <el-select v-model="form.region" placeholder="Please select a zone">
          <el-option label="Zone No.1" value="shanghai"></el-option>
          <el-option label="Zone No.2" value="beijing"></el-option>
        </el-select>
      </el-form-item>
    </el-form>
    <span slot="footer" class="dialog-footer">
    <el-button @click="isOpenDialogLogin = false">Cancel</el-button>
    <el-button type="primary" @click="isOpenDialogLogin = false">Confirm</el-button>
  </span>
  </el-dialog>
</template>

<script>

import {defineComponent} from "vue";
import {Message, PhoneFilled} from "@element-plus/icons-vue";
import axios from "axios";
import routers from '../routes/index'
import store from "../stores/_loader.js";
import GlobalHeader from "../layout/GlobalHeader.vue";

export default defineComponent({
  components: {GlobalHeader, Message, PhoneFilled},
  data() {
    return {
      images: [
        'https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages.vietnamworks.com%2Flogo%2Fbeiersdorf_hrbn_125556.jpg&w=3840&q=75',
        'https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages.vietnamworks.com%2Flogo%2Fniteco_hrbn24_125508.jpg&w=3840&q=75',
        'https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages.vietnamworks.com%2Flogo%2Fmondelez_hrbn24_125912.png&w=3840&q=75',
        'https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages.vietnamworks.com%2Flogo%2Fvinhome_hrbn24_125417.jpg&w=3840&q=75',
        'https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages.vietnamworks.com%2Flogo%2FBosch_hrbn24_125472.jpg&w=3840&q=75',
      ],
      isOpenDialogLogin: false,
      form: {
        name: '',
        region: '',
        date1: '',
        date2: '',
        delivery: false,
        type: [],
        resource: '',
        desc: ''
      },
      formLabelWidth: '120px',
      users: [],
      userSelect: '',
    }
  },
  computed: {},
  methods: {
    async updateUserSelect(value) {
      try {
        const response = await axios.get(
            "http://localhost:8000/api/users/" + value,
            {},
        );
        this.$store.commit("auth/setUser", response.data.data)
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    },
    clearUser() {
      this.$store.commit("auth/removeUser")
    },
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
  },
  async mounted() {
    await this.getAllUsers()
    this.userSelect = store.getters["auth/getUser"].id;
  }
})
</script>
<style>
#home {
  #header {
    color: #fff;
    height: 80px;
    padding: 0 20px 0 40px;
    display: flex;
    width: 100%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    font-family: sans-serif;

    .el-header {
      height: 100%;
      width: 100%;
    }

    .el-menu {
      top: 15px;
      color: #212f3f;
      font-family: "sans-serif";
      font-weight: 600;
      border: none;
      width: 85%;

      .el-menu-item {
        line-height: 1.5;
      }

      .el-menu-item:hover {
        background-color: #ffffff;
        color: #00b14f;
        cursor: pointer;
      }

      .login-register-btns {
        display: flex;
        align-items: center;
        position: absolute;
        right: 0;
        top: 5px;
      }

      .btn {
        width: 100px;
        height: 40px;
      }

      .login-btn {
        margin-right: 10px;
        border: 1px solid #00b14f;
        color: #00b14f;
        font-weight: 600;
      }

      .register-btn {
        font-weight: 600;
        background-color: #00b14f;
      }
    }

    .el-aside {
      overflow: unset;
    }

    .header-logo {
      width: 200px;
      height: 80px;
      cursor: pointer;
    }
  }

  height: 100vh;
  width: 100vw;

  .contact-footer {
    display: flex;
    align-items: center;
    font-family: sans-serif;
    margin-bottom: 10px;

    span {
      font-weight: 600;
      font-size: 16px;
      font-family: sans-serif;
    }

    .el-icon {
      margin-right: 5px;
    }
  }

  .carousel {
    height: 100%;
    width: 100%;
  }

  .top-company {
    width: 100%;
    padding: 0 100px 0 100px;

    .title-company {
      font-size: 26px;
      color: #00b14f;
      font-family: sans-serif;
    }

    .el-row {
      justify-content: center;

      .el-col {
        align-content: center;
        background-color: #f3f5f7;
        margin-left: 15px;
        margin-right: 15px;
        border-radius: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        cursor: pointer;


        .col-item {
          display: flex;
          flex-direction: column;
          align-items: center;
        }

        img {
          width: 100px !important;
          object-fit: cover;
          height: 100px;
        }

        h5 {
          width: 100%;
          text-align: center;
          font-size: 16px;
          font-family: sans-serif;
          font-weight: 600;
        }
      }
    }
  }

  .el-footer {
    h5 {
      margin-top: 0;
      padding-left: 40px;
      font-size: 16px;
      font-family: sans-serif;
    }

    ul {
      list-style: none;
      line-height: 2;
      color: #4d5965;
      font-family: sans-serif;
    }

    .list-first {
      padding-left: 0;
      display: flex;
      flex-direction: row;

      li {
        margin-right: 10px;
      }
    }

    .title-first {
      font-weight: 600;
      font-size: 16px;
      font-family: sans-serif;
    }
  }

  .copy-right {
    margin-top: 0;
    padding-bottom: 10px;
    height: 20px;
    width: 100%;
    text-align: center;
    color: #4d5965;
  }
}
</style>
