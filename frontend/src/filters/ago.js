import distanceInWordsToNow from 'date-fns/distance_in_words_to_now'

export default (value) => {
  return distanceInWordsToNow(value * 1000, {addSuffix: true})
}