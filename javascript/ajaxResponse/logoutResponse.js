function logoutResponse() {console.log(this.response);
  if (this.response.charAt(0) !== '{')
  {
    errorLog(this.response);
    return false;
  }

  let response = JSON.parse(this.response);

  if (response.error !== '') {
    document.getElementById('login_error').innerHTML = response.error;
  }
  else if (response.header_section !== '') {
    document.getElementById('header_section').innerHTML = response.header_section;
  }

}
