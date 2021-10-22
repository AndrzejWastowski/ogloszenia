/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 //import MultiStepForm from "./components//form/multiFormTest/MultiStepForm";

require('./components/SliderPromo');
require('./components/SliderPromoParm');
//require('./components/LikeButton');
require('./components/DatePickerDiv');
require('./components/form/FormReactContent');
//require('./components/form/multiFormTest/MultiStepForm');

//require('./components/PriceAutocomplete');

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
//add as many widget as you may need
