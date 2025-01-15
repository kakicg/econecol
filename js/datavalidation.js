$('#naccsdata').bootstrapValidator({
    live: 'enabled',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        email: {
             validators: {
                  notEmpty: { message: 'メールは必須です'},
                  emailAddress: { message: 'メールアドレスをお確かめください'}
             }
        },
        number: {
            validators: {
                notEmpty: { message: '必須なテキストは必須項目です' }
            }
        },
        use: {
            validators: {
                notEmpty: { message: '必須なテキストは必須項目です' }
            }
        },
        departure: {
            validators: {
                notEmpty: { message: '必須なテキストは必須項目です' }
            }
        },
        remarks: {
            validators: {
                notEmpty: { message: '必須なテキストは必須項目です' }
            }
        },
        notEmptyText: {
            validators: {
                notEmpty: { message: '必須なテキストは必須項目です' }
            }
        },
        digitsText: {
            validators: {
                notEmpty: { message: '0 と正の整数のテキストは必須項目です' },
                digits: { message: 'この項目は 0 と正の整数を入力してください' }
            }
        },
        realNumberText: {
            validators: {
                notEmpty: { message: '実数のテキストは必須項目です' },
                regexp: { message: '実数を入力してください', regexp: /^[-]?\d+(\.\d+)?$/ }
            }
        },
        stringLengthText: {
            validators: {
                notEmpty: { message: '文字数チェックのテキストは必須項目です' },
                stringLength: { message: '5文字以内で入力してください', min: 1, max: 5 }
            }
        },
        dateText: {
            validators: {
                notEmpty: { message: '日付フォーマットチェックのテキストは必須項目です' },
                date: { message: 'yyyy-MM-dd で入力してください', format: 'YYYY-MM-DD' }
            }
        }
    }
});