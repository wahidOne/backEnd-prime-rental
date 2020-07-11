const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const path = require("path");

module.exports = {
	entry: {
		transactions: "./assets/backEnd/Apps/Transactions/Transactions.js",
		master_data: "./assets/backEnd/Apps/MasterData/MasterData.js",
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
		// new webpack.ProvidePlugin({
		// 	$: "jquery",
		// 	jQuery: "jquery",
		// }),
		new CleanWebpackPlugin(),
	],

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
		],
	},
};
