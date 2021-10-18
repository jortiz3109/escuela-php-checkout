import Countdown from "../../resources/js/components/Countdown";
import { mount } from '@vue/test-utils';
import { DateTime } from "luxon";

describe('Countdown', () => {
    let wrapper, clock;

    beforeEach(() => {
        clock = jest.useFakeTimers();
        wrapper = mount(Countdown, {
            props: {
                expiration: DateTime.now().plus({minutes: 15}).toISO()
            }
        });
    })

    afterEach(() =>  jest.useRealTimers());

    test('it renders a countdown timer', () => {
        see('00:15:00');
    })

    test('it reduces the countdown every second', () => {
        see('00:15:00');

        clock.advanceTimersByTime(1000);

        wrapper.vm.$nextTick(() => {
            see('00:14:59');
        });
    })

    test('it stops countdown when gets to zero', () => {
        see('00:15:00');

        clock.advanceTimersByTime(900000); // 15 minutes

        wrapper.vm.$nextTick(() => {
            see('00:00:00');
            expect(wrapper.vm.intervalHandle).toBeUndefined()
        });
    })

    test('it shows zero if session is expired', () => {
        wrapper = mount(Countdown, {
            props: {
                expiration: DateTime.now().plus({minutes: -15}).toISO()
            }
        });

        see('00:00:00');
    })

    test('it broadcasts when session is expired', () => {
        see('00:15:00');

        clock.advanceTimersByTime(900000); // 15 minutes

        wrapper.vm.$nextTick(() => {
            expect(wrapper.emitted().expired).toBeTruthy()
        });
    })

    // Helper functions
    let see = (text, selector) => {
        let wrap = selector ? wrapper.find(selector) : wrapper;

        expect(wrap.html()).toContain(text);
    }
});
