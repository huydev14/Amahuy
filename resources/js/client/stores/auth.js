import { defineStore } from 'pinia';
import api from '../services/api';
import axios from 'axios';

const authChannel = new BroadcastChannel('auth_sync_channel');

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        token: null,
    }),

    getters: {
        isLoggedIn: (state) => !!state.token,
    },

    actions: {
        setToken(newToken) {
            this.token = newToken;
        },

        async login(credentials) {
            const response = await api.post('/login', credentials);

            if (response.data.success) {
                this.token = response.data.data.access_token;
                this.user = response.data.data.user;

                authChannel.postMessage({ type: 'LOGIN', token: this.token });
            }
            return response.data;
        },

        async silentRefresh() {
            try {
                const res = await axios.post(
                    '/api/v1/refresh',
                    {},
                    {
                        baseURL: 'api/v1',
                        withCredentials: true,
                    },
                );

                this.token = res.data.data.access_token;
                this.user = res.data.data.user;
                return true;
            } catch (error) {
                this.forceLogout();
                return false;
            }
        },

        async logout() {
            try {
                await api.post('/logout');
            } finally {
                this.forceLogout();
                authChannel.postMessage({ type: 'LOGOUT' });
                window.location.href = '/client/login';
            }
        },

        forceLogout() {
            this.user = null;
            this.token = null;
        },

        setupListeners() {
            authChannel.onmessage = (event) => {
                if (event.data.type === 'LOGOUT') {
                    this.forceLogout();
                    window.location.href = '/client/login';
                }
                if (event.data.type === 'TOKEN_REFRESHED' || event.data.type === 'LOGIN') {
                    this.setToken(event.data.token);
                }
            };
        },
    },
});
