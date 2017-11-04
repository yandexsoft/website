/**
 * _scripts/components/humble-button/trigger.vue
 * The suggested action button for displaying the popup
 */

<template>
    <button v-bind="$attrs" v-on="$listeners" class="suggested-action">{{ text }}</button>
</template>

<style scoped>
    .suggested-action {
        margin: 2px 8px;
        padding: 8px 16px;
    }
</style>

<script>
    export default {
        props: {
            active: {
                type: Boolean,
                default: false
            },

            purchased: {
                type: Boolean,
                default: false
            }
        },

        computed: {
            text () {
                if (this.purchased) {
                    return 'Download elementary'
                } else {
                    return 'Purchase elementary'
                }
            }
        }
    }
</script>
