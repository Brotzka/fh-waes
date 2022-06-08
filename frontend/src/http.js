import axios from "axios"
import store from "./store"

export const backendApi = () => {
  const http = axios.create({
    //baseURL: process.env.VUE_APP_API_BASE_URL + "api/",
    baseURL: "https://8000-brotzka-fhwaes-ay4tgdrm36c.ws-eu47.gitpod.io/api/",
    headers: {
      "Access-Control-Allow-Origin": "*"
    }
  });

  http.interceptors.request.use(function(config) {
    console.log("Config", config)

    const api_token = store.getters.api_token

    if(api_token != null) {
      config.headers['Authorization'] = `Bearer ${api_token}`
    }

    console.log(config)

    return config
  }, function(err) {
    return Promise.reject(err)
  })

  return http
} 

