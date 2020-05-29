$('#table_user').DataTable({
    'scrollx': true
});
$('.dropdown-toggle').dropdown()
$(document).ready(function(){
    $("#kategoriPesertaTambah").change(function() {
                console.log($("#kategoriPesertaTambah option:selected").val());
                if ($("#kategoriPesertaTambah option:selected").val() == 'mahasiswa') {
                    $('#intitutPesertaTambah').prop('hidden', false);
                } else {
                    $('#intitutPesertaTambah').prop('hidden', true);
                }
            });
        });