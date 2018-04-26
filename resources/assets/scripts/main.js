// import external dependencies
import 'jquery';
import 'jquery.cookie';

// Import everything from autoload
import "./autoload/**/*"

import * as loader from './bundle/functions/loader';

loader.init('.js-loader-page');
