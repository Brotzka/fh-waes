const user = (state) => {
    return state.user
}

const api_token = (state) => {
    return state.api_token
}

const userLoggedIn = (state, getters) => {
    return getters.user != null && getters.api_token != null
}

export default {
    user,
    api_token,
    userLoggedIn
}