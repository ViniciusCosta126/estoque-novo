import axios from "axios";
import "bootstrap/dist/css/bootstrap.min.css";
import "@popperjs/core";
import * as bootstrap from "bootstrap";

window.bootstrap = bootstrap;
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
