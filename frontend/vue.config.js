var ManifestPlugin = require('webpack-manifest-plugin');

module.exports = {
  // filenameHashing: false,
  devServer: {
    headers: {
      "Access-Control-Allow-Origin": "*",
    },
    disableHostCheck: true,
    writeToDisk: true
  },
  pwa: {
    name: 'Minipos',
  },
  configureWebpack: {
    plugins: [
      new ManifestPlugin({
        writeToFileEmit: true
      })
    ],
  },
  publicPath: '/dist',
  outputDir: '../web/dist',
  assetsDir: undefined,
  runtimeCompiler: undefined,
  productionSourceMap: undefined,
  parallel: undefined,
  css: {
    extract: false
  }
}