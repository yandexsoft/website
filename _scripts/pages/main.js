/**
 * _scripts/pages/main.js
 * Loads all of the site wide snippets
 *
 * @exports {Object} default - global vue instance
 */

import analytics from '~/lib/analytics'
import Vue from 'vue'

import popover from '~/widgets/popover.vue'

import '~/external-links'
import '~/popover'
import '~/smooth-scrolling'
import '~/twitter-links'

// Send some analytic information on every page load
analytics.then((ga) => {
    ga('send', 'pageview')
    ga('send', 'event', 'Language', 'Pageload', document.documentElement.lang)
})

Vue.component('ele-popover', popover)

export default new Vue({
    el: '#ele-app'
})
