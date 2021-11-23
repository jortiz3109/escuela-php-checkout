import state from './state'
import functions from './functions'

export default function useStore() {
    return {
        state,
        ...functions,
    }
}
