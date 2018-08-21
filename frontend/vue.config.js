var ManifestPlugin = require('webpack-manifest-plugin');

module.exports = {
  filenameHashing: false,

  pwa: {
    name: 'Minipos',
  },
  configureWebpack: {
    plugins: [
      new ManifestPlugin()
    ],
  },

  baseUrl: undefined,
  outputDir: '/dist',
  assetsDir: undefined,
  runtimeCompiler: undefined,
  productionSourceMap: undefined,
  parallel: undefined,
  css: {
    extract: false
  }
}