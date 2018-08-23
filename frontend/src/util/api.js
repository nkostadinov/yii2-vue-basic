/**
 * Created by Nikola nb on 04.02.2017.
 */
// import Vue from 'vue'
import axios from 'axios'


export default {
  get (url, request) {
    return axios.get(url, request)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },
  post (url, request, config) {
    return axios.post(url, request, config)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },
  put (url, request) {
    return axios.put(url, request)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },
  patch (url, request) {
    return axios.patch(url, request)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },
  delete (url, request) {
    return axios.delete(url, request)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  }
}

// Add a response interceptor
// axios.interceptors.response.use((response) => {
// })