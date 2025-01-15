
$(function () {
  var validator = $('.container-form').validate({
    rules:{
      "confirm_email": {
        equalTo: "#email"
      },
      'checkbox1[]': {
        required: true,
      },
      'radio1': {
        required: true,
      },
    },
    errorPlacement: function (error, element) {
      var $container = element.parents('.check_div').find('.error-container');

      if (element.attr("name") === "agree") {
        error.appendTo($container);
      } else {
        error.insertAfter(element);
      }
    }
  });
  $('[type=reset]').click(function(){
    validator.resetForm()
  })
});
$.extend($.validator.messages, {
  required: "必須項目です。",
  remote: "このフィールドを修正してください。",
  email: "有効なEメールアドレスを入力してください。",
  url: "有効なURLを入力してください。",
  date: "有効な日付を入力してください。",
  dateISO: "有効な日付（ISO）を入力してください。",
  number: "有効な数字を入力してください。",
  digits: "数字のみを入力してください。",
  creditcard: "有効なクレジットカード番号を入力してください。",
  equalTo: "同じ値をもう一度入力してください。",
  extension: "有効な拡張子を含む値を入力してください。",
  maxlength: $.validator.format("{0} 文字以内で入力してください。"),
  minlength: $.validator.format("{0} 文字以上で入力してください。"),
  rangelength: $.validator.format("{0} 文字から {1} 文字までの値を入力してください。"),
  range: $.validator.format("{0} から {1} までの値を入力してください。"),
  step: $.validator.format("{0} の倍数を入力してください。"),
  max: $.validator.format("{0} 以下の値を入力してください。"),
  min: $.validator.format("{0} 以上の値を入力してください。")
});
$.validator.addMethod("custom-email", function (value, element) {
  var emailArray = value.split('@');
  // preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/", "$str") && count($mailaddress_array) ==2

  return this.optional(element) || (/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/.test(value) && emailArray.length === 2);
}, "正しいメールアドレスを入力して下さい。");




