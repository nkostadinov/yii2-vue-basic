import api from "@/util/api";
import Vue from 'vue'

export function parseError (error) {
  return error.response.data[0].message
}

export function saveItem (model, data) {
  let url = data.id ? '/api/'+model+'/update' : '/api/'+model+'/create'
  let method = data.id ? 'put' : 'post'
  return api[method](url, data, {params: {id: data.id}}).then((response) => {
    return response
  }).catch((error) => {
    Vue.toasted.show(error, {type:'error'})
  })
}

export function deleteItem (model, data) {
  let url = '/api/'+model+'/delete'
  let method = 'delete'
  return api[method](url, {params: {id: data.id}}).then((response) => {
    return response
  }).catch((error) => {
    Vue.toasted.show(error, {type:'error'})
  })
}