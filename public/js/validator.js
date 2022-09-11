
//Doi tuong 'Validate'
function Validator (options) {

    var selectorRules = {}

    function getParent(element, selector) {
        while (element.parentElement) {
            if(element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }

    //Hàm thực hiện validate
    function validate (inputElement, rule) {        
        var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
        var errorMessage;

        //Lay ra cac rules cua selector
        var rules = selectorRules[rule.selector];

        // Lap qua tung rule & check
        // if error thi dung
        for (var i = 0; i < rules.length; ++i) {
            switch (inputElement.type) {
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](inputElement.value);
                    break;
                default: 
                    errorMessage = rules[i](inputElement.value);
            }
          
            if(errorMessage) break;
        }
                    
        if (errorMessage) {
            errorElement.innerText = errorMessage;
            getParent(inputElement, options.formGroupSelector).classList.add('invalid');
        } else {
            errorElement.innerText = '';
            getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
        }

        return !errorMessage;
    } 

    //Lấy element của form cần validate
    var formElement = document.querySelector (options.form);
    if (formElement) {
        //Khi submit form
        formElement.onsubmit = function (e) {
            e.preventDefault();

            var isFormValid = true;

            //Lap qua cac rule va validate
            options.rules.forEach (function (rule) { 
                var inputElement = formElement.querySelector (rule.selector);
                var isValidd = validate(inputElement, rule);   
                if(!isValidd) {
                    isFormValid = false;
                }
            });

            if(isFormValid) {
                //Truong hop submit voi javascript
               if (typeof options.onSubmit === 'function') {               
                    var enableInput = formElement.querySelectorAll('[name]:not([disabled])');
                    var formValues = Array.from(enableInput).reduce(function (values, input) {
                        values[input.name] = input.value
                        return values;
                    }, {});
                    options.onSubmit(formValues);
               } 
               // Truong hop submit voi hanh vi mac dinh
               else {
                    formElement.submit();
               }
            } 
        }    


        // Lap qua moi rule va xua lya
        options.rules.forEach (function (rule) {

            //Lưu lại các reles cho mỗi input
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }         

            var inputElement = formElement.querySelector (rule.selector);
           
            if (inputElement) {
                //xử lý trường hợp blur khỏi input
                inputElement.onblur = function () {
                    validate(inputElement, rule);                
                }

                //xử lý mỗi khi người dùng nhập lai input
                inputElement.oninput = function () {
                    var errorElement = getParent(inputElement, options.formGroupSelector).querySelector('.form-message');
                    errorElement.innerText = '';
                    getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
                }
            }           
        });
    }
}

//dinh nghia cac reles

// Nguyên tắc của các rules:
// 1. Khi có lỗi => Trả ra message lỗi
// 2. Khi hợp lệ => Không trả ra cái gì hết (undefined)
Validator.isRequired = function (selector, message) {
   return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : message || 'Vui lòng nhập trường này'
        }
    }
}

Validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'Trường này phải là email'; 
        }
    }
}

Validator.minLength = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : message || `Vui lòng nhâp tối thiểu ${min} kí tự`; 
        }
    }
}

Validator.isConfirmed = function (selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function (value) {
           return value === getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác'
        }
    }
}