import axios from "axios";

const token = document.querySelector('meta[name="csrf-token"]')
  .getAttribute('content');

const axiosInstance =  axios.create({
  headers: {
    'X-CSRF-TOKEN': token
  }
});

export default {
  post(endpoint, data) {
    return axiosInstance.post(endpoint, data);
  },
  get(endpoint) {
    return axiosInstance.get(endpoint);
  },
  delete(endpoint) {
    return axiosInstance.delete(endpoint);
  }
}
