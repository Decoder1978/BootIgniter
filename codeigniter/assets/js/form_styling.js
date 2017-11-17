function formStyling(form, view, form_style) {

  let form_input = $(form + ' textarea, ' + form + ' input');
  let srch_label = $(form + ' .search-label');
  let popuptext = $(form + ' .popuptext');

  form_input.attr('class', "form-control ");
  form_input.addClass('form-control ' + form_style);
  srch_label.attr('class', "search-label ");
  srch_label.addClass('search-label ' + form_style);
  if(view == "show")
    popuptext.show('1000');
  else
    popuptext.hide('1000');

  return form_style;
}

function formValidationStyles(form_id) {

  let form_status = "";
   $(form_id + ' .form-submit').click(function(e) {
      if($(form_id + ' .form-control').val().trim().length < 3) {
        e.preventDefault();
        e.stopPropagation();
        if(form_status != 'disabled')
          form_status = formStyling(form_id, 'show', 'disabled');
      }
      $(form_id + ' .form-control').on('click', function(e) {
        e.stopPropagation();
        if(form_status != 'focused')
          form_status = formStyling(form_id, 'hide', 'focused');
    //    console.log("2"+form_status); //repeated bug
      });
  })
}
