$(document).ready(function () {
  $(".surats").on("change", function (e) {
    e.preventDefault();

    let id = parseInt($(this).val());

    if (id == 1) {
      $('input[name="id_surat"]').val(id);

      $("#surat_kelahiran").show();
      $("#surat_kematian").hide();
      $("#surat_pengantar_warga").hide();
      $("#surat_pengantar_dinas").hide();
      $("#surat_pindah").hide();
    }

    if (id == 2) {
      $('input[name="id_surat"]').val(id);
      $("#surat_kelahiran").hide();

      $("#surat_kematian").show();
      $("#surat_pengantar_warga").hide();
      $("#surat_pengantar_dinas").hide();
      $("#surat_pindah").hide();
    }

    if (id == 3) {
      $('input[name="id_surat"]').val(id);
      $("#surat_kelahiran").hide();
      $("#surat_kematian").hide();

      $("#surat_pengantar_warga").show();
      $("#surat_pengantar_dinas").hide();
      $("#surat_pindah").hide();
    }

    if (id == 4) {
      $('input[name="id_surat"]').val(id);
      $("#surat_kelahiran").hide();
      $("#surat_kematian").hide();
      $("#surat_pengantar_warga").hide();

      $("#surat_pengantar_dinas").show();
      $("#surat_pindah").hide();
    }

    if (id == 5) {
      $('input[name="id_surat"]').val(id);
      $("#surat_kelahiran").hide();
      $("#surat_kematian").hide();
      $("#surat_pengantar_warga").hide();
      $("#surat_pengantar_dinas").hide();

      $("#surat_pindah").show();
    }
  });
});
