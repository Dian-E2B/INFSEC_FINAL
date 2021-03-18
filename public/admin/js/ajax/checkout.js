$(document).ready(function () {

  //settings
  $(document).on('click', '#apply-changes', function () {
    var checkbox_discounts = $('#discounts-checkbox').is(":checked");
    var type = $('#type').is(":checked");
    var user_id = $('#name').val();

    $('#cash').removeAttr('disabled');


    $.ajax({
      url: "../../app/controllers/admin/checkout/settings.php",
      method: "POST",
      dataType: "json",
      data: {
        checkbox_discounts: checkbox_discounts,
        type: type,
        user_id: user_id
      },
      success: function (data) {
        $('#subtotal').text(data.subtotal);
        $('#vat').text(data.vat);
        $('#discounts').text(data.discounts);
        $('#total').text(data.total);
        alert(data.user_id);


        swal("Success!", 'Changes have been applied.', "success");

      }
    })
  });


  $('#discounts-checkbox').click(function () {
    if (this.checked) {
      $('#discounts-input').removeAttr('disabled');
    } else {
      $('#discounts-input').attr('disabled', 'disabled');
    }
  });

  $('#discounts-input, #check-number, #check-amount').bind('input', function () {
    this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
  });

  $('#name').attr('disabled', 'disabled');
  $('#type').click(function () {
    if (this.checked) {
      $('#name').removeAttr('disabled');
    } else {
      $('#name').attr('disabled', 'disabled');
    }
  });


  $('#cash').bind('input', function () {
    this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
    var total = $('#total').text().replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
    var cash = $(this).val();
    var change = cash - total;
    $('#change').val(change.toFixed(2));

    if (change >= 0) {
      $('#pay').removeAttr('disabled');
    } else {
      $('#pay').attr('disabled', 'disabled');
    }

    if (!$('#cash').val()) {
      $('#change').val('0.00');
    }

  });



  //checkout
  $(document).on('click', '.pay', function () {
    var checkbox_discounts = $('#discounts-checkbox').is(":checked");
    var type = $('#type').is(":checked");
    var user_id = $('#name').val();

    $.ajax({
      url: "../../app/controllers/admin/checkout/checkout.php",
      method: "POST",
      dataType: "json",
      data: {
        checkbox_discounts: checkbox_discounts,
        type: type,
        user_id: user_id
      },
      success: function (data) {


        swal("Success!", 'nacheckout', "success");

      }
    })
  });

});