$(document).ready(function () {
  $("#formTambah :checkbox").on("change", function () {
    if (this.checked) {
      $(".akun").show(500);
    } else {
      $(".akun").hide(500);
    }
  });

  $("#formUbah :checkbox").on("change", function () {
    if (this.checked) {
      $(".akun").show(500);
    } else {
      $(".akun").hide(500);
    }
  });

  let inputIndex = 0;
  $(".tambah-anggota").on("click", function (e) {
    let input = `<div class="row" id="hapusx" data-index="${inputIndex}">
    <div class="col-md-5 col-12">
        <div class="form-group">
            <input type="number" min="1" id="nik_anggota" class="form-control" placeholder="NIK" name="nik_anggota[]" data-parsley-required="true">
        </div>
    </div>
    <div class="col-md-5 col-12">
        <div class="form-group">
            <input type="text" id="nama_anggota" class="form-control" placeholder="Nama Lengkap" name="nama_anggota[]" data-parsley-required="true">
        </div>
    </div>
</div>`;

    $(".input-anggota").append(input);
    inputIndex++;
  });

  $(".hapus-anggota").on("click", function (e) {
    e.preventDefault();
    if (inputIndex > 0) {
      $(
        ".input-anggota #hapusx[data-index='" + (inputIndex - 1) + "']"
      ).remove();
      inputIndex--;
    }
  });

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
