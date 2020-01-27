var setValidation = function(fieldName, isValid) {
  if (isValid){
    $('input[name=' + fieldName + ']').removeClass('is-invalid');
  }
  else {
    $('input[name=' + fieldName + ']').addClass('is-invalid');
  }
}

var addProduct = function(text) {
  console.log(text);
  var product = $('<li class="list-group-item">'+text+'</li>');
  $('#added_product').append(product);
}

$('.validated').on('change', 'input[type=number]', function(event) {
  var value = event.currentTarget.value;
  var name = event.currentTarget.name;
  if (value < 0 || value == '') {
    setValidation(name, false);
  } else {
    setValidation(name, true);
  }
});

$('#import_form').on('submit', function(event) {
  event.preventDefault();
  var form = this;
  var $form = $(this);

  // RETRIVE DATA
  var data = $form.serializeArray();
  var isValid = true;

  // VALIDATION
  data.forEach(function(field) {
    if (field.name == 'weight' || 
      field.name == 'height' || 
      field.name == 'width' || 
      field.name == 'depth'){
        if (field.value < 0 || field.value == '') {
          setValidation(field.name, false);
          isValid = false;
        } else {
          setValidation(field.name, true);
        }
      }
    if (field.name == 'type') {
      if (field.value == "") {
        $('select[name=type]').addClass('is-invalid');
        isValid = false;
      } else {
        $('select[name=type]').removeClass('is-invalid');
      }
    }
  });
  $form.addClass('validated');

  if (!isValid) return;

  // BUILD 
  var postData = {};
  data.forEach(function(field) {
    postData[field.name] = field.value;
  });

  $.ajax({
    url: 'post.php',
    method: 'post',
    data: postData,
    dataType: "json",
    success: function(resp) {
      addProduct(resp.product);
      // clear form
      $form.find('select, input').each(function(){
        $(this).val("");
      });
    }
  });
});