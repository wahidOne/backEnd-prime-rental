const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const path = require("path");

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const webpack = require("webpack");
const autoprefixer = require("autoprefixer");
const OptimizeCssAssetsPlugin = require("optimize-css-assets-webpack-plugin");

const TerserPlugin = require("terser-webpack-plugin");

module.exports = {
	entry: {
		transactions: "./assets/backEnd/Apps/Transactions/Transactions.js",
		master_data: "./assets/backEnd/Apps/MasterData/MasterData.js",
		users: "./assets/backEnd/Apps/Users/Users.js",
		profile: "./assets/backEnd/Apps/Profile/Profile.js",
	},
	watch: true,
	watchOptions: {
		ignored: /node_modules/,
		aggregateTimeout: 200,
		poll: 1000,
	},
	mode: "production",
	output: {
		filename: "[name]/[name].js",
		path: path.resolve(__dirname, "assets/backEnd/js/_costum/"),
	},
	plugins: [
		new webpack.LoaderOptionsPlugin({
			options: {
				postcss: [autoprefixer()],
			},
		}),
		new MiniCssExtractPlugin({
			filename: "../../css/costum/main.min.css",
			// filename: "dist/css/[name].min.css",
		}),
		// new webpack.ProvidePlugin({
		// 	$: "jquery",
		// 	jQuery: "jquery",
		// }),
		new CleanWebpackPlugin(),
	],
	optimization: {
		minimizer: [
			new webpack.LoaderOptionsPlugin({
				options: {
					postcss: [autoprefixer()],
				},
			}),
			new OptimizeCssAssetsPlugin(),
			new TerserPlugin(),
		],
	},

	module: {
		rules: [
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
			{
				test: /\.scss$/,
				exclude: /node_modules/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: "css-loader",
						options: {
							url: false, // leaflet uses relative paths
						},
					},
					"postcss-loader",
					"sass-loader",
				],
			},
		],
	},
};
