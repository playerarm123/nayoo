axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Add a request interceptor
axios.interceptors.request.use(function (config) {
  $('.is-invalid').removeClass('is-invalid');
  $('.invalid-feedback').remove();
  // Do something before request is sent
  return config;
}, function (error) {
  // Do something with request error
  return Promise.reject(error);
});

// Add a response interceptor
axios.interceptors.response.use(function (response) {
  // Any status code that lie within the range of 2xx cause this function to trigger
  // Do something with response data
  return response;
}, function (error) {
  let response = error.response;
  if (response.status == 422) {
    let errors = response.data.errors;
    for (let elementId in errors) {
      let inputEl = $(`#${elementId}`)
      inputEl.addClass('is-invalid');
      let errorMsg = errors[elementId].join(' , ');
      $(`<div class="invalid-feedback">${errorMsg}</div>`).insertAfter(inputEl);
    }
  }
  // Any status codes that falls outside the range of 2xx cause this function to trigger
  // Do something with response error
  return Promise.reject(error);
});


function swalSuccess(content = 'บันทึกสำเร็จ', title = 'Success !!') {
  return Swal.fire({
    title: title,
    text: content,
    icon: 'success',
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  });
}
function swalError(content = 'เกิดข้อผิดพลาด', title = 'Failed !!') {
  return Swal.fire({
    title: title,
    text: content,
    icon: 'error',
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  });
}
function swalWarning(content, title = 'คำเตือน') {
  return Swal.fire({
    title: title,
    text: content,
    icon: 'warning',
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  });
}
function swalDelete(content = 'คุณต้องการลบรายการนี้ใช่ไหม?', title = 'คุณกำลังจะลบข้อมูล !!') {
  return Swal.fire({
    title: title,
    text: content,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'ใช่',
    cancelButtonText: 'ยกเลิก',
    customClass: {
      confirmButton: 'btn btn-primary me-3',
      cancelButton: 'btn btn-label-secondary'
    },
    buttonsStyling: false
  })
}
function swalConfirm(content, title) {
  return Swal.fire({
    title: title,
    text: content,
    icon: 'info',
    showCancelButton: true,
    confirmButtonText: 'ตกลง',
    cancelButtonText: 'ยกเลิก',
    customClass: {
      confirmButton: 'btn btn-primary me-3',
      cancelButton: 'btn btn-label-secondary'
    },
    buttonsStyling: false
  })
}
function swalLoading(title = 'กรุณารอสักครู่ !', content = 'ระบบกำลังดำเนินการ') {
  Swal.fire({
    title: title,
    html: content,// add html attribute if you want or remove
    allowOutsideClick: false,
    didOpen: () => {
      Swal.showLoading()
    },
  });
}