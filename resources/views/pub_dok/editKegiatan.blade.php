@include('tampilan.head')


<style>
    * {
        box-sizing: border-box;
    }

    input[type=text], select, textarea {
        width: 100%;
        padding: 17px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        margin-left: 100px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: left;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #ffffff;
        padding: 5px;
    }

    .col-25 {
        padding-left: 100px;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        padding-left: 100px;
        width: 50%;
        margin-top: 6px;
    }
    #form1{
        width: 750px;
        height: 500px;

        margin-left: 300px;
    }
    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
    #uploadFile{
        height: 50px;
        width: 510px;
        border-radius: 5px;
        border-style: groove;
    }
</style>
<div id="form1">
    <h1>Edit data Kegiatan</h1>
    <div class="container">
        <form method="POST" action="{{url('edit/kegiatan/'.$dokumen->id_pubdok)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            @if ($errors->has('foto'))
            <div class="alert alert-danger">Format atau ukuran file tidak sesuai</div>
            @endif
            <div class="row">
                <div class="col-25">
                    <label for="jurusan">Foto Kegiatan</label>
                </div>
                <div class="col-75">
                    <input id="uploadFile" type="file" name="foto" value="{{$dokumen->file}}">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="spkw">Tema Kegiatan</label>
                </div>
                <div class="col-75">
                    <select id="kegiatan" name="kegiatan">
                        <option disabled="false"> --pilih kegiatan--</option>
                        <option @if($dokumen->tema=="Pengajian") selected="true" @endif >Pengajian</option>
                        <option @if($dokumen->tema=="Pelatihan") selected="true" @endif>Pelatihan</option>
                        <option @if($dokumen->tema=="Magang") selected="true" @endif>Magang</option>
                        <option @if($dokumen->tema=="Bersih-bersih") selected="true" @endif>Bersih-bersih</option>
                        <option @if($dokumen->tema=="Kuliah") selected="true" @endif>Kuliah</option>
                        <option @if($dokumen->tema=="Pembinaan") selected="true" @endif>Pembinaan</option>
                        <option @if($dokumen->tema=="Pemilihan PUB") selected="true" @endif>Pemilihan PUB</option>
                        <option @if($dokumen->tema=="Bakti Sosial") selected="true" @endif>Bakti Sosial</option>
                        <option @if($dokumen->tema=="Masak-masak") selected="true" @endif>Masak-masak</option>
                        <option @if($dokumen->tema=="Makan-makan") selected="true" @endif>Makan-makan</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="jurusan">Keterangan</label>
                </div>
                <div class="col-75">

                    <textarea name="ket" style="width: 50%;height: 30%;">{{$dokumen->keterangan}}</textarea>

                </div>
            </div>
            <div class="row">
                <input type="submit" value="Simpan">
            </div>
        </form>
    </div>
</div>
@include('tampilan.foot')
