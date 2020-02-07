$(document).ready(function () {
    $('#cities').change(function(){
        value = $('#cities option:selected').attr('value');
        $('.points').html('Поиск ПВЗ');
        $.post("api.php", {"city_name":value},
        function(data){
            $('.points').html('');
        data.forEach(function(item){
            $('.points').append('<label for="'+item['code']+'">'+
                '<div class="point__name">'+item['name']+'</div>'+
                '<div class="point__adress">'+item['adress']+'</div></label>'+
                '<input id = "'+item['code']+'" name = "point" type="radio" value = "'+item['code']+'">'
                );
        });
        }, 'json');
    });
});