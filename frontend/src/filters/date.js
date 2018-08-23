import format from 'date-fns/format'
import store from '@/store'

export default (value, date_format) => {
  let _date_format = date_format ? date_format : store.state.dateFormat
  return format(new Date(value * 1000), _date_format)
}