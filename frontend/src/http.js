import axios from "axios"
import store from "./store"

export const backendApi = () => {
  const baseUrl = process.env.VUE_APP_API_BASE_URL + "api/"

  const http = axios.create({
    //baseURL: process.env.VUE_APP_API_BASE_URL + "api/",
    baseURL: baseUrl,
    headers: {
      "Access-Control-Allow-Origin": "*"
    }
  });

  http.interceptors.request.use(function(config) {
    const api_token = store.getters.api_token

    if(api_token != null) {
      config.headers['Authorization'] = `Bearer ${api_token}`
    }
    return config
  }, function(err) {
    return Promise.reject(err)
  })

  return http
} 

