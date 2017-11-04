/**
 * _scripts/components/humble-button/selector.vue
 * Shows a group of buttons to pick price
 */

<template>
    <div>
        <button value="5" class="small-button payment-button target-amount" @click="onChange(5)">5</button>
        <button value="10" class="small-button payment-button target-amount" @click="onChange(10)">10</button>
        <button value="25" class="small-button payment-button target-amount" @click="onChange(25)">25</button>

        <div>
            <span class="pre-amount">$</span>
            <input type="number" step="0.01" min="0" max="999999" class="button small target-amount" placeholder="Custom">
            <p class="small-label focus-reveal text-center">Enter any dollar amount.</p>
        </div>
    </div>
</template>

<style scoped>

</style>

<script>
    export default {
        data () {
            return {
                /**
                 * The custom amount entered
                 *
                 * @var {Number|null}
                 */
                amount: null
            }
        },

        methods: {
            /**
             * Emits event for parent when the input amount changes.
             *
             * @param {Number}
             */
            onChange (amount) {
                this.$emit('input', amount)
            }
        }
    }
</script>
