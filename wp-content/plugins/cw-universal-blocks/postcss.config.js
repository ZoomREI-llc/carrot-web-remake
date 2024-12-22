const path = require("path");
const fs = require("fs");

module.exports = {
	plugins: [
		require("postcss-import"),
		require("postcss-nested"),
		require("autoprefixer"),
		require("cssnano"),
	],
};
