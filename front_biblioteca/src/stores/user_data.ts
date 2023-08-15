import { defineStore } from 'pinia'
import api from '@/api';


export const useLoginStore = defineStore('user_data',  {
  state: () => ({
    isAuthenticated: false,
    user:{},
    access_token:'',
    token_type:'',
    expires_in:'',
  }),
  actions: {
    async login(email:string, password:string) {
      try {
        const response = await api.post('/auth/login', { email, password });
        if (response.status === 200) {
          this.isAuthenticated = true;
          this.user = response.data.user;
          this.access_token = response.data.access_token;
          this.token_type = response.data.token_type;
          this.expires_in = response.data.expires_in;
          localStorage.setItem('token', this.access_token);
          localStorage.setItem('user', JSON.stringify(this.user));
        } else {
          throw new Error('Inicio de sesión fallido');
        }
      } catch (error) {
        throw new Error('Inicio de sesión fallido');
      }
    },
    async logout() {
      this.isAuthenticated = false;
      this.user = {};
      this.access_token = '';
      this.token_type = '';
      this.expires_in = '';
      await api.post('/auth/logout');
      localStorage.removeItem('token');

    },
  },
})
