/**
 * Created by Nikola nb on 04.02.2017.
 */
// import Vue from 'vue'
import axios from 'axios'


export default {
  get (url, request) {
    return axios.get(url, request)
  },
  post (url, request, config) {
    return axios.post(url, request, config)
  },
  put (url, request) {
    return axios.put(url, request)
  },
  patch (url, request) {
    return axios.patch(url, request)
  },
  delete (url, request) {
    return axios.delete(url, request)
  }
}

// Add a response interceptor
// axios.interceptors.response.use((response) => {
// })