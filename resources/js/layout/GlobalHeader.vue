<template>
  <el-container>
    <div id="header">
      <el-aside width="200px"><img @click="goHome" src="https://static.topcv.vn/v4/image/logo/topcv-logo-6.png"
                                   alt="TopCV tuyen dung tai TopCV" title="TopCV tuyển dụng tại TopCV"
                                   class="header-logo"></el-aside>
      <el-header>
        <el-menu mode="horizontal" class="center-menu-items">
          <el-menu-item @click="goToJob" index="1">Việc làm phù hợp</el-menu-item>
          <el-menu-item @click="goToSetting" index="3">Cài đặt</el-menu-item>
          <div class="login-register-btns" style="width: 180px">
            <el-select v-model="selected" @clear="clearUser" clearable placeholder="Chọn Profile"
                       @change="updateUserSelect">
              <el-option v-for="item in users" :key="item.id" :label="item.name" :value="item.id">
              </el-option>
            </el-select>
          </div>
        </el-menu>
      </el-header>
    </div>
  </el-container>
</template>
<script>
import {defineComponent} from "vue";
import axios from "axios";
import store from "../stores/_loader.js";
import routers from "../routes/index.js";

export default defineComponent({
  name: 'GlobalHeader',
  props: ['users'],
  data() {
    return {
      selected: '',
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
        window.location.reload()
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    },
    clearUser() {
      this.$store.commit("auth/removeUser")
      window.location.reload()
    },
    goHome() {
      const router = routers
      router.push('/')
    },
    goToSetting() {
      const router = routers
      router.push('jobs/settings')
    },
    goToJob() {
      const router = routers
      router.push('/jobs')
    }
  },
  async mounted() {
    this.selected = store.getters["auth/getUser"]?.id ?? '';
  }
})
</script>
<style lang="scss">
#header {
  color: #fff;
  height: 80px;
  padding: 0 20px 0 40px;
  display: flex;
  width: 100%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
  font-family: "Arial", sans-serif;

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
</style>