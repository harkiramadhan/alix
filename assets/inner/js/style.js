$("#shortSiswa").change(function() {
    var filterValue = $(this).val();
    var row = $('.dataSiswa'); 
    row.hide()
    row.each(function(i, el) {
    if($(el).attr('data-type') == filterValue) {
        $(el).show();
        }
    })
    if ("semua" == filterValue) {
      row.show();
    }
    });

setTimeout(function(){ 
    $(".alert").fadeOut("slow"); 
}, 4000 ); 

$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$(document).ready(function() {
    $("#myInput2").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable2 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$(document).ready(function() {
    $("#myInput3").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable3 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$(document).ready(function() {
    $("#myInput4").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable4 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$(document).ready(function() {
    $("#myInput5").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable5 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$(document).ready(function() {
    $(".myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

function previewImage() {
    var element = document.getElementById("image-preview");
        element.classList.remove("d-none");

    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
};

function previewImage2() {
    var element = document.getElementById("image-preview2");
        element.classList.remove("d-none");

    document.getElementById("image-preview2").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source2").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview2").src = oFREvent.target.result;
    };
};

function previewImage3() {
    var element = document.getElementById("image-preview3");
        element.classList.remove("d-none");

    document.getElementById("image-preview3").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source3").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview3").src = oFREvent.target.result;
    };
};

function previewImage4() {
    var element = document.getElementById("image-preview4");
        element.classList.remove("d-none");

    document.getElementById("image-preview4").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source4").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview4").src = oFREvent.target.result;
    };
};