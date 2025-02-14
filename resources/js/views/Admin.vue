<template>
    <div id="home">
        <el-container>
            <div id="header">
                <el-aside width="200px"><img src="https://static.topcv.vn/v4/image/logo/topcv-logo-6.png"
                        alt="TopCV tuyen dung tai TopCV" title="TopCV tuyển dụng tại TopCV"
                        class="header-logo"></el-aside>
                <el-header>
                    <el-menu mode="horizontal" class="center-menu-items">
                        <el-menu-item index="1">Việc làm phù hợp</el-menu-item>
                        <el-menu-item index="2">Việc làm yêu thích</el-menu-item>
                        <el-menu-item index="3">Công ty</el-menu-item>
                        <div class="login-register-btns">
                            <el-select v-model="userSelect" clearable placeholder="Select">
                                <el-option v-for="item in users" :key="item.value" :label="item.label"
                                    :value="item.value">
                                </el-option>
                            </el-select>
                            <el-button @click="this.isOpenDialogRegister = true" type="success"
                                class="register-btn btn">Đăng nhập
                            </el-button>
                        </div>
                    </el-menu>
                </el-header>
            </div>
        </el-container>
        <el-main class="main">
            <el-col :span="4" class="sidebar">
                <el-menu default-active="1" class="">
                    <el-menu-item index="1">
                        <i class="el-icon-menu"></i>
                        <span>Tạo mới công việc</span>
                    </el-menu-item>
                    <el-menu-item index="2">
                        <i class="el-icon-menu"></i>
                        <span>Danh sách công việc</span>
                    </el-menu-item>
                </el-menu>
            </el-col>
            <JobForm :job-form="form" @submit="onSubmit()"/>
        </el-main>
        <el-container>
            <el-footer>
                <el-row>
                    <el-col :span="6">
                        <div>
                            <img style="width: 330px; height: 130px"
                                src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/logo/topcv-logo-footer-6.png"
                                alt="logo-footer">
                        </div>
                        <div>
                            <p class="title-first">Kết nối với chúng tôi</p>
                            <ul class="list-first">
                                <li><img src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/footer/facebook.png"
                                        alt=""></li>
                                <li><img src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/footer/youtube.png"
                                        alt=""></li>
                                <li><img src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/footer/linkedin.png"
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
                            width="400" height="220" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
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

import { defineComponent } from "vue";
import  JobForm  from './components/Jobform.vue';
import { Message, PhoneFilled } from "@element-plus/icons-vue";
import axios from "axios";


export default defineComponent({
    components: { Message, PhoneFilled, JobForm },
    data() {
        return {
            form: {
                jobName: '',
                region: '',
                dateRange: '',
                minSalary: null,
                maxSalary: null,
                quantity: null,
                level: null,
                type: null,
                gender: 0,
                skill: [],
                desc: '',
                expNumber: null,
                positions: [],
            },
            isOpenDialogLogin: false,
            isOpenDialogRegister: false,
            formLabelWidth: '120px',
            users: [],
            userSelect: '',
        }
    },
    computed: {
    },
    methods: {
        onSubmit() {
            console.log(this.form);
        }
    },
    async mounted() {
    }
})
</script>
<style lang="scss" scoped>
.main {
    padding: 0;
    display: flex;
    flex-direction: row;
    :deep(.form-wrapper) {
        padding: 30px 0;
    }
    :deep(.form ){
        margin: 0 auto;
    }
}

.sidebar {
    min-height: 500px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 12px 0;

    :deep(.el-menu) {
        border-right: 0;
    }
}
</style>
