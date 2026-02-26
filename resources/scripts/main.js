import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

// import local dependencies
import Router from './util/Router';
import common from '../js/routes/common';
import home from '../js/routes/home';
import aboutUs from '../js/routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
