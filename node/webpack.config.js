var webpack = require("webpack");

module.exports = {
	entry: {
		app: ["webpack/hot/dev-server", "./app/app.js"],
	},
	output: {
		path: './public/web',
		filename: 'bundle.js'
	},
	module: {
	  loaders: [
			{ test: /\.js?$/, exclude: /(node_modules|bower_components)/, loader: 'babel' },
			{ test: /\.jsx?$/, exclude: /(node_modules|bower_components)/, loader: 'babel' },
			{
                test: /\.(scss|sass)$/i,
                loader: "style!css!sass"
            },
            {
                test: /\.(less)$/i,
                loader: "style!css!less"
            },
      { 
      	test: /[\\\/]bower_components[\\\/]modernizr[\\\/]modernizr\.js$/,
      	loader: "imports?this=>window,html5=>window.html5!exports?window.Modernizr'"
      },
			{ test: /\.css$/, loader: 'style-loader!css-loader' },
			{ test: /\.eot(\?v=\d+\.\d+\.\d+)?$/, loader: "file" },
			{ test: /(\.jade$)/, exclude: /node_modules/, loader: 'jade-loader' },
			{ test: /\.(woff|woff2)(\?\S*)?$/, loader:"url?prefix=font/&limit=5000" },
			{ test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/, loader: "url?limit=10000&mimetype=application/octet-stream" },
			{ test: /\.svg(\?v=\d+\.\d+\.\d+)?$/, loader: "url?limit=10000&mimetype=image/svg+xml" },
			, {
					test: /\.(jpe?g|png|gif|cur)(\?\S*)?$/i,
					loaders: [
					  'file?hash=sha512&digest=hex&name=img2/[name].[ext]',
					  'image-webpack?{progressive:true, optimizationLevel: 7, interlaced: false}'
					]
			},
			{ test: /\.html$/, loader: 'file-loader?name=[path][name].[ext]!extract-loader!html-loader' },
			{ test: /\.hbs/, loader: "handlebars-template-loader" },

	  ],

	  plugins: [
        new webpack.ResolverPlugin([
            new webpack.ResolverPlugin.DirectoryDescriptionFilePlugin("bower.json", ["main"])
        ], ["normal", "loader"])
    ]
	}
};
