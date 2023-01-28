$(document).ready(function () {
    let currentNumber = 0;
    let timeOff = "10:30";
    console.log(timeOff);
    let tanggal = new Date().toISOString().slice(0, 10);
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });
    scanner.addListener('scan', function (content) {
        let currentDate = new Date();
        let jam = currentDate.getHours() + ":" + currentDate.getMinutes();
        currentNumber++;

        if (jam < timeOff) {
            $('#modalShort').modal('show');
            return;
        }
        console.log(content);
        $.ajax({
            type: "POST",
            url: "/api/dashboard",
            data: {
                student_nis: content,
                tanggal: tanggal,
                status: "Hadir",
                keterangan: ""
            },
            success: function (response) {
                console.log(response);
                if (response.message) {
                    $('#pesan').text(response.message);
                    $('#modalShort').modal('show');
                    return;
                }
                $('#data').prepend(`
                <div class="card mb-3">
                       <div class="card-header border-0">
                        <div class="d-flex justify-content-end float-end">
                            <small class="pt-1">` + jam + `</small>
                        </div>
                        <a></a> ` + currentNumber + `.&nbsp;&nbsp;&nbsp; ` + response.nis + ` | ` + response.nama + ` | ` + response.kelas + ` </a>
                       </div>
                </div>
                `);
            }
        });
    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('Tidak ada kamera yang ditemukan.');
        }
    }).catch(function (e) {
        console.error(e);
    });

    $('#alert-absensi').text('Batas waktu absensi dibuka sampai jam ' + timeOff);
});
