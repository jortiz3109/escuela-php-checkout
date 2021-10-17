import Countdown from "../../resources/js/components/Countdown";
import { mount } from '@vue/test-utils';
import { DateTime } from "luxon";
import sinon from "sinon";

describe('Countdown', () => {
    let wrapper, clock;

    beforeEach(() => {
        clock = sinon.useFakeTimers();
        wrapper = mount(Countdown, {
            props: {
                expiration: DateTime.now().plus({minutes: 15}).toISO()
            }
        });
    })

    afterEach(() => clock.restore());

    test('renders a countdown timer', () => {
        see('00:15:00');
    })

    test('reduces the countdown every second', () => {
        see('00:15:00');

        clock.tick(1000);

        wrapper.vm.$nextTick(() => {
            see('00:14:59');
        });
    })

    test('broadcasts when the countdown has completed', () => {
        clock.tick(900000); // 15 minutes

        wrapper.vm.$nextTick(() => {
            expect(wrapper.emitted().expired).toBeTruthy()
        });
    });

    // Helper functions
    let see = (text, selector) => {
        let wrap = selector ? wrapper.find(selector) : wrapper;

        expect(wrap.html()).toContain(text);
    }
});
