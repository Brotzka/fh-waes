const user = (state) => {
    const user = JSON.parse(localStorage.getItem('user'))
    state.user = user
    console.log(state)
    console.log("User:", user)

    return user
}

const api_token = (state) => {
    const api_token = localStorage.getItem('api_token')
    state.api_token = api_token
    return api_token
}

const userLoggedIn = (state, getters) => {
    return getters.user != null && getters.api_token != null
}

export default {
    user,
    api_token,
    userLoggedIn
}