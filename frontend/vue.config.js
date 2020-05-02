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
    name: process.env.APPLICATION_NAME,
    manifestPath: '../manifest.json',
    workboxOptions: {
      // swSrc is required in InjectManifest mode.
      // swDest: '../service-worker.js',
      // ...other Workbox options...
    }

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