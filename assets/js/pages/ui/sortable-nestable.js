$(function () {
    $('.dd').nestable();

    $('.dd').on('change', function () {
        var $this = $(this);



        var serializedData = window.JSON.stringify($($this).nestable('serialize'));
        var data2 = {
            data: serializedData
        };
        

        $.ajax({
            type: "POST",
            url: "http://localhost:8080/Monitoring/proyek/updatemenu",
            data: data2,
            cache: false,
            success: function (result) {
                //console.log(result)
                location.reload();
            }
        });


        var test = $this.parents('div.body').find('textarea').val(serializedData);

    });



    $('.dd4').nestable();

    $('.dd4').on('change', function () {
        var $this = $(this);

        var serializedData = window.JSON.stringify($($this).nestable('serialize'));
    });
});