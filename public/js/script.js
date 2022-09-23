$(function () {
  $(".tambahData").on("click", function () {
    $("#exampleModalLabel").html("tambah data mahasiswa");

    $("#nama").val("nama");
    $("#email").val("email");
  });

  $(".editData").on("click", function () {
    $("#exampleModalLabel").html("edit data mahasiswa");
    $(".modal-body form").attr("action", "http://localhost:8080/konsep-mvc/public/mhs/edit");

    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost:8080/konsep-mvc/public/mhs/getedit",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama_mhs);
        $("#email").val(data.email_mhs);
        $("#id").val(data.id_mhs);
      },
    });
  });
});
