$(document).ready(function() {
					$('#search1').off('keyup');
					$('#search1').on('keyup', function() {
							// Your search term, the value of the input
							var searchTerm = $('#search1').val();
							// table rows, array
							var tr = [];

							// Loop through all TD elements
							$('#table').find('td').each(function() {
									var value = $(this).html();
									// if value contains searchterm, add these rows to the array
									if (value.toLowerCase().includes(searchTerm.toLowerCase())) {
											tr.push($(this).closest('tr'));

									}
							});

							// If search is empty, show all rows
							if ( searchTerm == '') {
									$('tr').show();
							} else {
									// Else, hide all rows except those added to the array
									$('tr').not('thead tr').hide();
									tr.forEach(function(el) {
											el.show();
									});
							}
					});
			});
// Add Record 
function mulaitambah() {
    // get values
    var nis = $("#nisadd").val();
    var nama = $("#namaadd").val();
    var kelas = $("#kelasadd").val();
    var jk = $("#jkadd").val();

    // Add record
    $.post("proses_insert.php", {
        nis: nis,
        nama: nama,
        kelas: kelas,
        jk: jk
    }, function (data, status) {
        // close the popup
        $("#tambah_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#nisadd").val("");
        $("#namaadd").val("");
        location.reload();
    });
}
function readRecords() {
    $.get("../admin/xiirpl_admin.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});
function deletesiswa(id) {
    $("#hidden_delete_id").val(id);
    $.post("../admin/bacasiswa.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
        }
    );
    // Open modal popup
    $("#deletesiswa").modal("show");   
}
function siswadelete() {
    // get hidden field value
    var id = $("#hidden_delete_id").val();

    // Update the details by requesting to the server using ajax
    $.post("../admin/delete.php", {
            id: id
        },
        function (data, status) {
            // hide modal popup
            $("#deletesiswa").modal("hide");
            // reload Users by using readRecords();
            location.reload();
        }
    );
}

function siswaupdate() {
    // get values
    var nis = $("#nisupdate").val();
    var nama = $("#namaupdate").val();
    var kelas = $("#kelasupdate").val();
    var jk = $("#jkupdate").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("../admin/proses_edit.php", {
            id: id,
            nis: nis,
            nama: nama,
            kelas: kelas,
            jk: jk
        },
        function (data, status) {
            // hide modal popup
            $("#updatesiswa").modal("hide");
            // reload Users by using readRecords();
            location.reload();
        }
    );
}
function tambahkelas() {
    // get values
    var kelas = $("#kelasadd").val();
    var jurusan = $("#jurusanadd").val();
    var keterangan = $("#keteranganadd").val();

    // Add record
    $.post("proses_insertkelas.php", {
        kelas: kelas,
        jurusan: jurusan,
        keterangan: keterangan
    }, function (data, status) {
        // close the popup
        $("#tambah_kelas").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#kelasadd").val("");
        $("#jurusanadd").val("");
        $("#keteranganadd").val("");
    });
    location.reload();
}
function deletekelas(id_kelas) {
    $("#hidden_deletekelas_id").val(id_kelas);
    $.post("../admin/bacakelas.php", {
            id_kelas: id_kelas
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
        }
    );
    // Open modal popup
    $("#deletekelas1").modal("show");    
}
function kelasdelete() {
    // get hidden field value
    var id_kelas = $("#hidden_deletekelas_id").val();

    // Update the details by requesting to the server using ajax
    $.post("../admin/deletekelas.php", {
            id_kelas: id_kelas
        },
        function (data, status) {
            // hide modal popup
            $("#deletekelas1").modal("hide");
            // reload Users by using readRecords();
            location.reload();
        }
    );
}
function datakelas(id_kelas) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_kelas_id").val(id_kelas);
    $.post("../admin/bacakelas.php", {
            id_kelas: id_kelas
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#kelasupdate").val(user.kelas);
            $("#jurusanupdate").val(user.jurusan);
            $("#keteranganupdate").val(user.keterangan);
        }
    );
    // Open modal popup
    $("#updatekelas").modal("show");
}

function kelasupdate() {
    // get values
    var kelas = $("#kelasupdate").val();
    var jurusan = $("#jurusanupdate").val();
    var keterangan = $("#keteranganupdate").val();

    // get hidden field value
    var id = $("#hidden_kelas_id").val();

    // Update the details by requesting to the server using ajax
    $.post("../admin/proses_editkelas.php", {
            id: id,
            kelas: kelas,
            jurusan: jurusan,
            keterangan: keterangan
        },
        function (data, status) {
            // hide modal popup
            $("#updatekelas").modal("hide");
            // reload Users by using readRecords();
            location.reload();
        }
    );
}
function tambahabsen(kelas) {
    var tanggal = $("#tanggaladd").val();
    var idsiswa = $("#jurusanadd").val();
    var idkelas = $("#keteranganadd").val();
    var keterangan = $("#keteranganadd").val();
    var selesai = $("#keteranganadd").val();

    // Add record
    $.post("proses_insertkelas.php", {
        kelas: kelas,
        jurusan: jurusan,
        keterangan: keterangan
    }, function (data, status) {
        
        // read records again
        readRecords();

        // clear fields from the popup
        $("#kelasadd").val("");
        $("#jurusanadd").val("");
        $("#keteranganadd").val("");
    });
    location.reload();
}