import Vue from 'vue'
import ProfileEditor from './components/ProfileEditor'

// LoDash cuz its awesome
window._ = require('lodash')

// import vue
window.Vue = require('vue')

Vue.prototype.$_window = window

/**
 * Startup Vue
 */

const editor = document.querySelector('#profile-editor')
const directory = document.querySelector('#directory')
const single = document.querySelector('#profile-single')
console.log('app js', editor, directory, single)
// if (editor) {
//   const userId = editor.dataset('id')
console.log('go')
new Vue({
  components: {
    ProfileEditor
  }
}).$mount('#profile-editor')
// }

if (single) {
//   const profileId = single.dataset('id')
  new Vue({
    components: {}
  }).$mount('#profile-single')
}

if (directory) {
// set up vue
  new Vue({
    components: {}
  }).$mount('#directory')
}
