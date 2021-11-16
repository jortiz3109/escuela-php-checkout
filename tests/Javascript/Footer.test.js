import Footer from '../../resources/js/components/TransactionFooter'
import { flushPromises, mount } from '@vue/test-utils'
import useStep from '../../resources/js/use/useStep'

describe('footer', () => {
    let wrapper
    const { step, stepForward } = useStep()

    const cancelLinkText = 'Do not want to continue'
    const backButtonText = 'Back'

    beforeEach(() => (wrapper = mount(Footer)))

    afterEach(() => (step.value = 1))

    it('should not render back button on first step', () => {
        dontSee(backButtonText)
        see(cancelLinkText)
    })

    it('shows back button on second step', async () => {
        stepForward()

        await flushPromises()

        see(backButtonText)
        see(cancelLinkText)
    })

    it('can back a step clicking a button', async () => {
        step.value = 2
        await flushPromises()

        see(backButtonText)
        see(cancelLinkText)

        wrapper.find('button').trigger('click')
        await flushPromises()

        expect(step.value).toBe(1)
        dontSee(backButtonText)
        see(cancelLinkText)
    })

    it('should not render cancel link when in last step', async () => {
        step.value = 4
        await flushPromises()

        see(backButtonText)
        dontSee(cancelLinkText)
    })

    // Helper functions
    let see = (text, selector) => {
        let wrap = selector ? wrapper.find(selector) : wrapper

        expect(wrap.html()).toContain(text)
    }

    let dontSee = (text, selector) => {
        let wrap = selector ? wrapper.find(selector) : wrapper

        expect(wrap.html()).not.toContain(text)
    }
})
