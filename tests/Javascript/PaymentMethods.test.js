import PaymentMethods from '../../resources/js/components/PaymentMethods'
import { flushPromises, mount } from '@vue/test-utils'
import { defineComponent, h, Suspense } from 'vue'
import axios from 'axios'
import { useHelpers } from '../../resources/js/use'

jest.mock('axios')

describe('paymentMethods', () => {
    let wrapper

    const mockPaymentMethodsResponse = {
        data: [
            {
                id: 1,
                name: 'Visa credit',
                category: 'credit',
                logo: 'https://logos-marcas.com/wp-content/uploads/2020/04/Visa-Emblema.png',
            },
            {
                id: 2,
                name: 'Visa debit',
                category: 'debit',
                logo: 'https://seeklogo.com/images/V/visa-electron-logo-71BEC57E8F-seeklogo.com.png',
            },
        ],
        meta: {
            payment_methods_count: 2,
            categories: ['DEBIT', 'CREDIT'],
        },
    }

    axios.get.mockResolvedValue({ data: mockPaymentMethodsResponse })

    const mountSuspense = async (component, options) => {
        const wrapper = mount(
            defineComponent({
                render() {
                    return h(Suspense, null, {
                        default: h(component),
                        fallback: h('div', 'fallback'),
                    })
                },
            }),
            options
        )

        await flushPromises()
        return wrapper
    }

    beforeEach(async () => {
        createMeta('session', 'd216cc99-e54f-3425-92d7-62aca86b84fc')
        createMeta('token', 'd216cc99-e54f-3425-92d7-62aca86b84fc')

        wrapper = await mountSuspense(PaymentMethods)
        flushPromises()
    })

    it('can fetch payment methods', () => {
        expect(axios.get).toHaveBeenCalledTimes(1)
    })

    it('can show the payment methods categories', () => {
        see('Credit Card')
        see('Debit Card')
    })

    it('broadcasts when a payment method is selected', async () => {
        const { state } = useHelpers()
        const paymentMethodsComponent = wrapper.findComponent(PaymentMethods)

        expect(state.paymentMethod.category).toBeUndefined()
        const buttons = paymentMethodsComponent.findAll('button')
        buttons[0].trigger('click')
        expect(state.paymentMethod.category).toEqual('DEBIT')
        buttons[1].trigger('click')
        expect(state.paymentMethod.category).toEqual('CREDIT')
    })

    // Helper functions
    let see = (text, selector) => {
        let wrap = selector ? wrapper.find(selector) : wrapper

        expect(wrap.html()).toContain(text)
    }

    let createMeta = (name, value) => {
        let meta = document.createElement('meta')
        meta.setAttribute('name', name)
        meta.content = value
        document.getElementsByTagName('head')[0].appendChild(meta)
    }
})
