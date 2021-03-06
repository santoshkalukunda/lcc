"use strict";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
global.$ = global.jquery = require('jquery');

require("../../node_modules/bootstrap/dist/js/bootstrap");

require("../script/nepalidate");

require("../script/script");

window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue')["default"]);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var app = new Vue({
  el: '#app'
});
var mainInput = document.getElementById("nepali-datepicker");
/* Initialize Datepicker with options */

mainInput.nepaliDatePicker({
  ndpYear: true,
  ndpMonth: true,
  ndpYearCount: 200
});
var mainInput = document.getElementById("nepali-datepicker-1");
/* Initialize Datepicker with options */

mainInput.nepaliDatePicker({
  ndpYear: true,
  ndpMonth: true,
  ndpYearCount: 200
});
var mainInput = document.getElementById("nepali-datepicker-2");
/* Initialize Datepicker with options */

mainInput.nepaliDatePicker({
  ndpYear: true,
  ndpMonth: true,
  ndpYearCount: 200
});