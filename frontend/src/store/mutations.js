const user = (state, payload) => {
    state.user = payload
    localStorage.setItem('user', JSON.stringify(payload))
}

const api_token = (state, payload) => {
    state.api_token = payload
    localStorage.setItem('api_token', payload)
}

export default {
    user,
    api_token
}