$(document).ready(function(){
    $('#formWafatAyah').hide();
    $('#formWafatIbu').hide();

    $('#statusayah').change(function(){
        if(this.value == "wafat"){
            $('#inputWafatAyah').prop('required', true);
            $('#formWafatAyah').show();
        }else{
            $('#inputWafatAyah').prop('required', false);
            $('#formWafatAyah').hide();
        }
    });

    $('#statusibu').change(function(){
        if(this.value == "wafat"){
            $('#inputWafatIbu').prop('required', true);
            $('#formWafatIbu').show();
        }else{
            $('#inputWafatIbu').prop('required', false);
            $('#formWafatIbu').hide();
        }
    });

    var statusAyah = $( "#statusayah option:selected" ).text();
    var statusIbu = $( "#statusibu option:selected" ).text();

    if(statusAyah === "Wafat"){
        $('#inputWafatAyah').prop('required', true);
        $('#formWafatAyah').show();
    }

    if(statusIbu === "Wafat"){
        $('#inputWafatIbu').prop('required', true);
        $('#formWafatIbu').show();
    }
});