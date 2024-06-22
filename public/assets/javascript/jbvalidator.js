$(function() {
    let validator = $('.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
        language: 'assets/library/jbvalidator/lang/zh.json'
    });

    validator.reload();
});