// axios

import axios from 'axios'

const baseURL = 'http://localhost/starter-kit/public/api/'

export default axios.create({
  baseURL
  // You can add your headers here
})
