/**
 * _scripts/pages/index.js
 * Entry file to the new Vue based elementary scripts
 */

import Vue from 'vue'

Vue.component('humble-button', (r) => require(['~/components/humble-button/index.vue'], r))

export default new Vue({
    el: '#content-container'
})
