import {backendApi} from "@/http"

const userRegister = (context, user) => {

  backendApi
    .post("users/register", user)
    .then((resp) => {
        context.commit('user', resp.data.user)
        context.commit('api_token', resp.data.api_token)
    })
    .catch((err) => {
      console.warn(err);
    })
}

export default {
  userRegister
}
