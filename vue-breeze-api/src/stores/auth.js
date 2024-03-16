import { defineStore } from "pinia"; 
import axios from "axios";

export const useAuthStore = defineStore("auth", {
    state: () => ({
        authUser:null,
        authErrors: []
    }),
    getters: {
        user: (state) => state.authUser,
        errors: (state)=> state.authErrors
    },
    actions:{
        async getToken(){
            await axios.get("/sanctum/csrf-cookie");
        },
        async getUser(){
            await this.getToken();
            const data = await axios.get("/api/user");
            this.authUser = data.data;
        },
        async handleLogin(data){
            this.authErrors = [];
            await getToken();
            try{
                await axios.post('/login', {
                    email: data.email,
                    password: data.password
                  });
                   this.router.push("/")
            }catch(error){
                if(error.response.statue === 442){
                    this.authErrors = error.response.data.errors;
                }
            }
            
        },
        async handleRegister(data){
            this.authErrors = [];
            await getToken();
            try{
                await axios.post('/register',{
                    name: data.name,
                    email: data.email,
                    password: data.password,
                    password_confirmation: data.password_confirmation,
                  });
                  this.router.push("/");
            }catch(error){
                if(error.response.statue === 442){
                    this.authErrors = error.response.data.errors;
                }
            }
        },
        async handleLogout(){
            await axios.post("/logout");
            this.authUser = null;
        },
        async handleForgotPassword(email){
            this.authErrors = [];
            this.getToken();
            try{
                await axios.post("/forgot-passwprd",{
                    email: emaiil,
                });
            }catch(error){
                if(error.response.statue === 442){
                    this.authErrors = error.response.data.errors;
                }
            }
        }
    }
})