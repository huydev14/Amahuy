<template>
    <AuthLayout
        title="Đăng nhập"
        :errorMessage="errorMessage"
        actionText="tiếp tục"
    >
        <form @submit.prevent="handleLogin" class="login-form" novalidate>
            <div class="a-input-text-group">
                <label for="email" class="a-form-label">Email hoặc số điện thoại di động</label>
                <input id="email" type="email" v-model="form.email" required class="a-input-text" />
            </div>

            <div class="a-input-text-group">
                <div class="password-label-group">
                    <label for="password" class="a-form-label">Mật khẩu</label>
                    <a href="#" class="a-link-normal forgot-password">Quên mật khẩu?</a>
                </div>
                <input id="password" type="password" v-model="form.password" required class="a-input-text" />
            </div>

            <button type="submit" class="a-button-primary" :disabled="isLoading">
                {{ isLoading ? 'Đang xử lý...' : 'Tiếp tục' }}
            </button>
        </form>

        <template #footer-action>
            <div class="a-divider a-divider-break">
                <h5>Mới biết đến Amahuy?</h5>
            </div>
            <router-link to="/register" custom v-slot="{ navigate }">
                <button @click="navigate" class="a-button-secondary">Tạo tài khoản Amahuy của bạn</button>
            </router-link>
        </template>
    </AuthLayout>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '../stores/auth';
import AuthLayout from '@client/layouts/AuthLayout.vue'; // Nhớ điều chỉnh path nếu cần

const router = useRouter();
const authStore = useAuthStore();

const form = reactive({
    email: '',
    password: '',
});

const isLoading = ref(false);
const errorMessage = ref('');

const handleLogin = async () => {
    isLoading.value = true;
    errorMessage.value = '';

    try {
        const response = await authStore.login({
            email: form.email,
            password: form.password,
        });

        if (response.success) {
            router.push({ name: 'Home' });
        }
    } catch (error) {
        if (error.response && error.response.data) {
            errorMessage.value = error.response.data.message || 'Đã có lỗi xảy ra, vui lòng thử lại!';
        } else {
            errorMessage.value = 'Không thể kết nối đến máy chủ.';
        }
    } finally {
        isLoading.value = false;
    }
};
</script>
