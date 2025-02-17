@include('user.header', ['title'=>'Zonasi Risiko COVID-19 Daerah TPA PUB (Update Mingguan)'])
<style>
    #content {
        padding: 0 32px 32px 32px;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        margin: auto;
    }

    th,
    td {
        padding: 8px;
    }
</style>
<script type="text/javascript">
    var xmlhttp = new XMLHttpRequest();

    let kodeDaerah = {
        "Garut": 3205,
        "Garut Selatan": 3205,
        "Cianjur": 3203,
        "Banjarsari": 3207,
        "Pangandaran": 3218,
        "Ciamis": 3207,
        "Banjar": 3279,
        "Pekanbaru": 1471,
        "Batusangkar": 1304,
        "Cilacap": 3301,
        "Banyumas": 3302,
        "Bogor": 3271,
        "Salatiga": 3373,
        "Cirebon": 3274,
        "Kabupaten Bandung Barat": 3217,
        "Indramayu": 3212,
        "Padang Sidempuan": 1277,
        "Kota Tasikmalaya": 3278,
        "Kota Bandung": 3273,
        "Kabupaten Tasikmalaya": 3206,
        "Purwakarta": 3214,
        "Boyolali": 3309
    };

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    xmlhttp.onreadystatechange = async function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            let progress = 0;
            for (let i = 0; i < data.data.length; i++) {
                for (let nama in kodeDaerah) {
                    if (data.data[i].kode_kota == kodeDaerah[nama]) {
                        let baris = document.createElement("tr");
                        document.getElementById("tabel").appendChild(baris);
                        let selkodeDaerah = document.createElement("td");
                        baris.appendChild(selkodeDaerah);
                        selkodeDaerah.innerText = nama;
                        let selStatus = document.createElement("td");
                        baris.appendChild(selStatus);
                        if (data.data[i].hasil == "RESIKO RENDAH") {
                            selStatus.innerText = "Risiko rendah";
                            selStatus.style.backgroundColor = "#ded716";
                        } else if (data.data[i].hasil == "RESIKO SEDANG") {
                            selStatus.innerText = "Risiko sedang";
                            selStatus.style.backgroundColor = "#fc8403";
                            selStatus.style.color = "white";
                        } else if (data.data[i].hasil == "RESIKO TINGGI") {
                            selStatus.innerText = "Risiko tinggi";
                            selStatus.style.backgroundColor = "#bd1900";
                            selStatus.style.color = "white";
                        }
                        progress++;
                        document.getElementById("progress").innerText = (progress * 100 / Object.keys(kodeDaerah).length).toFixed();
                    }
                }
                await sleep(10);
            }
            document.getElementById("keterangan").innerText = "*Data per " + data.tanggal + " (data diperbarui secara mingguan oleh server)";
        }
    };
    xmlhttp.open("GET", "https://cors-anywhere.herokuapp.com/https://data.covid19.go.id/public/api/skor.json", true);
    xmlhttp.send();
</script>
<div id="content">
    <h1>Zonasi Risiko COVID-19 Daerah Sosialisasi PUB</h1>
    <p id="keterangan">Mengumpulkan data dari server <span id="progress">0</span>%...</p>
    <p>Sumber data: data.covid19.go.id</p>
    <table>
        <thead>
            <th>Daerah Sosialisasi</th>
            <th>Status</th>
        </thead>
        <tbody id="tabel"></tbody>
    </table>
</div>
@include('user.footer')