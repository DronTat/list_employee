$('document').ready(function () {
    $('.report-index').on('click', 'button', function () {
        var id = $('.form-control').val();
        if (id === ''){
            alert('Ошибочка');
            return false;
        }
        location.href = 'export?id=' + id;
    });
});