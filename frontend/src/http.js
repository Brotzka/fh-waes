import axios from "axios"

const baseURL = process.env.VUE_APP_API_BASE_URL + "api/"
console.log(baseURL)

export const backendApi =  axios.create({
  //baseURL: process.env.VUE_APP_API_BASE_URL + "api/",
  baseURL: "https://8000-brotzka-fhwaes-ay4tgdrm36c.ws-eu47.gitpod.io/api/",
  headers: {
    "Access-Control-Allow-Origin": "*"
  }
});

export default backendApi
