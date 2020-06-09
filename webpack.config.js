const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const path = require("path");
const webpack = require("webpack");

module.exports = {
	entry: {
		costum: "./assets/frontEnd/index.js",
	},
	watch: true,
	watchOptions: {
		ignored: /node_modules/,
		aggregateTimeout: 200,
		poll: 1000,
	},
	mode: "production",
	output: {
		filename: "front-costum.js",
		path: path.resolve(__dirname, "assets/frontEnd/costum"),
	},
	plugins: [
		new webpack.ProvidePlugin({
			$: "jquery",
			jQuery: "jquery",
		}),
		new CleanWebpackPlugin(),
	],

	module: {
		rules: [
			// {
			// 	test: /\.html$/,
			// 	use: ["html-loader"],
			// },
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: "babel-loader",
					options: {
						presets: ["@babel/env"],
						plugins: ["transform-class-properties"],
					},
				},
			},
		],
	},
};
