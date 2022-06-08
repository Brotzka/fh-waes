const user = (state, payload) => {
    state.user = payload
    localStorage.setItem('user', JSON.stringify(payload))
}

const api_token = (state, payload) => {
    state.api_token = payload
    localStorage.setItem('api_token', payload)
}

const unsetUser = (state) => {
    localStorage.removeItem("user")
    state.user = null
}

const unsetApiToken = (state) => {
    localStorage.removeItem('api_token')
    state.api_token = null
}

const initialiseStore = (state) => {
    if(localStorage.getItem('user') !== null) {
        state.user = JSON.parse(localStorage.getItem('user'))
    }

    if(localStorage.getItem('api_token') !== null) {
        state.api_token = localStorage.getItem('api_token')
    }
}

export default {
    user,
    api_token,
    unsetUser,
    unsetApiToken,
    initialiseStore
}