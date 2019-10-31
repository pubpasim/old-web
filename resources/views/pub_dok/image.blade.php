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
        width: 100%;
        border-radius: 5px;
        border-style: groove;
    }
</style>
<h1></h1>
<div class="row" >
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h2 align="center">Tambah Data Dokumentasi PUB</h2></div>
            <div class="panel-body">
                <form method="POST" action="{{url('simpan/kegiatan')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-25">
                            @if ($errors->has('foto'))
                            <div class="alert alert-danger">Format atau ukuran file tidak sesuai</div>
                            @endif
                            <label for="jurusan">Foto Kegiatan</label>
                        </div>
                        <div class="col-75">
                            <input id="uploadFile" type="file" name="foto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="spkw">Angkatan</label>
                        </div>
                        <div class="col-75">
                            <select name="select"  >
                                <option >--Pilih Angkatan--</option>
                                @foreach($angkatan as $data)
                                <option value="{{$data->id_angkatan}}">
                                    Angkatan {{ $data->angkatan }}
                                </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="spkw">Divisi</label>
                        </div>

                        <div class="col-75">
                            <select id="kegiatan" name="kegiatan">
                                <option> --pilih Divisi--</option>
                                <option>Divisi Pendidikan</option>
                                <option>Divisi Kerohanian</option>
                                <option>Divisi Kebersihan</option>
                                <option>Divisi Keasramaan</option>
                                <option>Divisi Magang</option>
                                <option>Divisi Kesehatan</option>
                                <option>Divisi Kesejahteraan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="jurusan">Keterangan</label>
                        </div>
                        <div class="col-75">
                            <textarea name="ket" style="width: 100%;height: 70%;"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('tampilan.foot')
