var ManifestPlugin = require('webpack-manifest-plugin');

module.exports = {
  // filenameHashing: false,
  devServer: {
    headers: {
      "Access-Control-Allow-Origin": "*",
    },
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

  baseUrl: 'http://localhost:8080/',
  outputDir: '../web/dist',
  assetsDir: undefined,
  runtimeCompiler: undefined,
  productionSourceMap: undefined,
  parallel: undefined,
  css: {
    extract: false
  }
}