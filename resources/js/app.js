require("./bootstrap.min");
require("./jquery.scrollUp.min");
require("./html5shiv");
require("./gmaps");
require("./price-range");
require("./jquery.scrollUp.min");
require("./main");

import Alpine from "alpinejs";
// import { $, jQuery } from "jquery";
window.Alpine = Alpine;

Alpine.start();

window._ = require("lodash");
try {
  window.Popper = require("popper.js").default;
  //   window.$ = window.jQuery = require("jquery");
  //   window.$ = $;
  //   window.jQuery = jQuery;

  //   require("bootstrap");
} catch (e) {}

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
