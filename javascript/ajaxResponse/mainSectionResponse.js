function mainSectionResponse() {
  if (this.response.charAt(0) !== '{')
  {
    errorLog(this.response);
    return false;
  }

  let response = JSON.parse(this.response);


  document.getElementById('main_section').innerHTML = response.main_section;

}
