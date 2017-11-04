/**
 * _scripts/components/humble-button/index.vue
 * A basic humble button wrapper. Does all the heavy lifting with stripe.
 */

<template>
    <div class="humble-button">
        <slot name="trigger">
            <trigger @click="toggle"/>
        </slot>

        <slot name="popover" v-if="active">
            <popover>
                <selector :amount="amount" />

                aasdasdfasdf
            </popover>
        </slot>
    </div>
</template>

<style scoped>

</style>

<script>
    import popover from './popover'
    import selector from './selector'
    import trigger from './trigger'

    export default {
        components: {
            popover,
            selector,
            trigger
        },

        data () {
            return {
                /**
                 * True if the popover is currently active.
                 *
                 * @var {Boolean}
                 */
                active: false,

                /**
                 * The payment amount in USD dollars.
                 *
                 * @var {Number}
                 */
                amount: 10
            }
        },

        methods: {
            /**
             * Toggles the humble popover
             *
             * @return {void}
             */
            toggle () {
                this.active = !this.active
            }
        }
    }
</script>
