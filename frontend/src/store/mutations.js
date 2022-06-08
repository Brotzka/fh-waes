const user = (state, payload) => {
    state.user = payload
}

const api_key = (state, payload) => {
    state.api_key = payload
}

export default {
    user,
    api_key
}