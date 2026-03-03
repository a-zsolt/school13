import { reactive, computed } from 'vue'

const state = reactive({
    user: null, // { id, name, role }
})

export function useAuth() {
    const isAuthenticated = computed(() => !!state.user)
    const user = computed(() => state.user)

    function login({ role }) {
        state.user = role === 'admin'
            ? { id: 10, name: 'Admin Anna', role: 'admin' }
            : { id: 11, name: 'Béla User', role: 'user' }
    }

    function logout() {
        state.user = null
    }

    return { state, user, isAuthenticated, login, logout }
}
