<script src="../../assets/js/bootstrap.js"></script>
<script src="../../assets/js/app.js"></script>

<script src="../../assets/js/pages/dashboard.js"></script>


<script src="../../assets/js/jQuery-3.6.4.js"></script>

<script src="../../assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="../../assets/js/pages/simple-datatables.js"></script>



<script src="../../assets/js/my.js"></script>
<script src="../../assets/js/orgchart.js"></script>

<script>
    $(document).ready(function() {

        //Get Data Pegawai
        $.ajax({
            type: "GET",
            url: "./../../app/Controller/ajax/getPegawai.php",
            dataType: 'json',
            success: function(response) {
                response.forEach(function(value, key) {
                    //console.log(value);
                    var chart = new OrgChart(document.getElementById("tree"), {
                        template: "diva",
                        scaleInitial: 0.6,
                        enableSearch: false,
                        mouseScrool: OrgChart.action.none,
                        nodeBinding: {
                            field_0: "name",
                            field_1: "title",
                            img_0: "img"
                        },

                        nodes: [{
                                id: 1,
                                name: response[1].jabatan == 'KEPDES' ? response[1].nama : '',
                                title: response[1].jabatan == 'KEPDES' ? response[1].jabatan : '',
                                img: "./../../assets/images/foto/" + response[1].foto

                            },
                            {
                                id: 2,
                                pid: 1,
                                name: response[0].jabatan == 'SEKRETARIS LURAH' ? response[0].nama : '',
                                title: response[0].jabatan == 'SEKRETARIS LURAH' ? response[0].jabatan : '',
                                img: "./../../assets/images/foto/" + response[0].foto
                            },
                            {
                                id: 3,
                                pid: 1,
                                name: response[2].jabatan == 'KASI PEMERINTAHAN DAN YANUM' ? response[2].nama : '',
                                title: response[2].jabatan == 'KASI PEMERINTAHAN DAN YANUM' ? response[2].jabatan : '',
                                img: "./../../assets/images/foto/" + response[2].foto
                            }, {
                                id: 4,
                                pid: 1,
                                name: response[5].jabatan == 'KASI PEMBERDAYAAN MASYARAKAT' ? response[5].nama : '',
                                title: response[5].jabatan == 'KASI PEMBERDAYAAN MASYARAKAT' ? response[5].jabatan : '',
                                img: "./../../assets/images/foto/" + response[5].foto
                            }, {
                                id: 5,
                                pid: 1,
                                name: response[6].jabatan == 'KASI TRANTIB' ? response[6].nama : '',
                                title: response[6].jabatan == 'KASI TRANTIB' ? response[6].jabatan : '',
                                img: "./../../assets/images/foto/" + response[6].foto
                            }, {
                                id: 6,
                                pid: 2,
                                name: response[3].jabatan == 'STAFF' ? response[3].nama : '',
                                title: response[3].jabatan == 'STAFF' ? response[3].jabatan : '',
                                img: "./../../assets/images/foto/" + response[3].foto
                            }, {
                                id: 7,
                                pid: 3,
                                name: response[4].jabatan == 'STAFF' ? response[4].nama : '',
                                title: response[4].jabatan == 'STAFF' ? response[4].jabatan : '',
                                img: "./../../assets/images/foto/" + response[4].foto
                            }, {
                                id: 8,
                                pid: 4,
                                name: response[7].jabatan == 'STAFF' ? response[7].nama : '',
                                title: response[7].jabatan == 'STAFF' ? response[7].jabatan : '',
                                img: "./../../assets/images/foto/" + response[7].foto
                            }, {
                                id: 9,
                                pid: 5,
                                name: response[8].jabatan == 'STAFF' ? response[8].nama : '',
                                title: response[8].jabatan == 'STAFF' ? response[8].jabatan : '',
                                img: "./../../assets/images/foto/" + response[8].foto
                            }

                        ]

                    });
                });



            }
        });

    });
</script>
</body>

</html>